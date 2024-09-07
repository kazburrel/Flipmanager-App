"use strict";

var KTAppInboxReply = (function () {
    const e = (e) => {
            const t = e.querySelector('[data-kt-inbox-form="cc"]'),
                a = e.querySelector('[data-kt-inbox-form="cc_button"]'),
                n = e.querySelector('[data-kt-inbox-form="cc_close"]'),
                o = e.querySelector('[data-kt-inbox-form="bcc"]'),
                r = e.querySelector('[data-kt-inbox-form="bcc_button"]'),
                l = e.querySelector('[data-kt-inbox-form="bcc_close"]');
            a.addEventListener("click", (e) => {
                e.preventDefault(),
                    t.classList.remove("d-none"),
                    t.classList.add("d-flex");
            }),
                n.addEventListener("click", (e) => {
                    e.preventDefault(),
                        t.classList.add("d-none"),
                        t.classList.remove("d-flex");
                }),
                r.addEventListener("click", (e) => {
                    e.preventDefault(),
                        o.classList.remove("d-none"),
                        o.classList.add("d-flex");
                }),
                l.addEventListener("click", (e) => {
                    e.preventDefault(),
                        o.classList.add("d-none"),
                        o.classList.remove("d-flex");
                });
        },
        t = (e) => {
            const t = e.querySelector('[data-kt-inbox-form="send"]');
            t.addEventListener("click", function () {
                t.setAttribute("data-kt-indicator", "on"),
                    setTimeout(function () {
                        t.removeAttribute("data-kt-indicator");
                    }, 3e3);
            });
        },
        a = (e) => {
            var t,
                a = new Tagify(e, {
                    tagTextProp: "name",
                    enforceWhitelist: !0,
                    skipInvalid: !0,
                    dropdown: {
                        closeOnSelect: !1,
                        enabled: 0,
                        classname: "users-list",
                        searchKeys: ["name", "email"],
                    },
                    templates: {
                        tag: function (e) {
                            return `\n                <tag title="${
                                e.title || e.email
                            }"\n                        contenteditable='false'\n                        spellcheck='false'\n                        tabIndex="-1"\n                        class="${
                                this.settings.classNames.tag
                            } ${
                                e.class ? e.class : ""
                            }"\n                        ${this.getAttributes(
                                e
                            )}>\n                    <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>\n                    <div class="d-flex align-items-center">\n                        <div class='tagify__tag__avatar-wrap ps-0'>\n                            <img onerror="this.style.visibility='hidden'" class="rounded-circle w-25px me-2" src="{{ asset('media/${
                                e.avatar
                            }') }}">\n                        </div>\n                        <span class='tagify__tag-text'>${
                                e.name
                            }</span>\n                    </div>\n                </tag>\n            `;
                        },
                        dropdownItem: function (e) {
                            return `\n                <div ${this.getAttributes(
                                e
                            )}\n                    class='tagify__dropdown__item d-flex align-items-center ${
                                e.class ? e.class : ""
                            }'\n                    tabindex="0"\n                    role="option">\n\n                    ${
                                e.avatar
                                    ? `\n                            <div class='tagify__dropdown__item__avatar-wrap me-2'>\n                                <img onerror="this.style.visibility='hidden'"  class="rounded-circle w-50px me-2" src="{{ asset('media/${e.avatar}') }}">\n                            </div>`
                                    : ""
                            }\n\n                    <div class="d-flex flex-column">\n                        <strong>${
                                e.name
                            }</strong>\n                        <span>${
                                e.email
                            }</span>\n                    </div>\n                </div>\n            `;
                        },
                    },
                    whitelist: JSON.parse(
                        document
                            .querySelector('input[name="compose_to"]')
                            .getAttribute("data-staff-users")
                    ).map((user) => ({
                        value: user.uuid,
                        name: user.fname,
                        avatar: user.avatar,
                        email: user.email,
                    })),
                });
            a.on("dropdown:show dropdown:updated", function (e) {
                var n = e.detail.tagify.DOM.dropdown.content;
                a.suggestedListItems.length > 1 &&
                    ((t = a.parseTemplate("dropdownItem", [
                        {
                            class: "addAll",
                            name: "Add all",
                            email:
                                a.settings.whitelist.reduce(function (e, t) {
                                    return a.isTagDuplicate(t.value)
                                        ? e
                                        : e + 1;
                                }, 0) + " Members",
                        },
                    ])),
                    n.insertBefore(t, n.firstChild));
            }),
                a.on("dropdown:select", function (e) {
                    e.detail.elm == t && a.dropdown.selectAll.call(a);
                });
        },
        n = (e) => {
            new Quill("#kt_inbox_form_editor", {
                modules: {
                    toolbar: [
                        [{ header: [1, 2, !1] }],
                        ["bold", "italic", "underline"],
                        ["image", "code-block"],
                    ],
                },
                placeholder: "Type your text here...",
                theme: "snow",
            });
            const t = e.querySelector(".ql-toolbar");
            if (t) {
                const e = [
                    "px-5",
                    "border-top-0",
                    "border-start-0",
                    "border-end-0",
                ];
                t.classList.add(...e);
            }
        },
        o = (e) => {
            const t = '[data-kt-inbox-form="dropzone"]',
                a = e.querySelector(t),
                n = e.querySelector('[data-kt-inbox-form="dropzone_upload"]');
            var o = a.querySelector(".dropzone-item");
            o.id = "";
            var r = o.parentNode.innerHTML;
            o.parentNode.removeChild(o);
            var l = new Dropzone(t, {
                url: "/admin/team/upload-temporary-file",
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                paramName: "file",
                maxFilesize: 5,
                addRemoveLinks: true,
                previewTemplate: r,
                previewsContainer: t + " .dropzone-items",
                clickable: n,
                success: function (file, response) {
                    file.serverId = response.id;
                    $("<input>")
                        .attr({
                            type: "hidden",
                            name: "attachment_ids[]",
                            value: response.id,
                        })
                        .appendTo("form#kt_inbox_reply_form");
                },
                removedfile: function (file) {
                    var id = file.serverId;
                    $(
                        'input[name="attachment_ids[]"][value="' + id + '"]'
                    ).remove();
                    var _ref;
                    return (_ref = file.previewElement) != null
                        ? _ref.parentNode.removeChild(file.previewElement)
                        : void 0;
                },
            });
            l.on("addedfile", function (e) {
                a.querySelectorAll(".dropzone-item").forEach((e) => {
                    e.style.display = "";
                });
            }),
                l.on("totaluploadprogress", function (e) {
                    a.querySelectorAll(".progress-bar").forEach((t) => {
                        t.style.width = e + "%";
                    });
                }),
                l.on("sending", function (e) {
                    a.querySelectorAll(".progress-bar").forEach((e) => {
                        e.style.opacity = "1";
                    });
                }),
                l.on("complete", function (e) {
                    const t = a.querySelectorAll(".dz-complete");
                    setTimeout(function () {
                        t.forEach((e) => {
                            (e.querySelector(".progress-bar").style.opacity =
                                "0"),
                                (e.querySelector(".progress").style.opacity =
                                    "0");
                        });
                    }, 300);
                });
        };
    return {
        init: function () {
            document
                .querySelectorAll('[data-kt-inbox-message="message_wrapper"]')
                .forEach((e) => {
                    const t = e.querySelector(
                            '[data-kt-inbox-message="header"]'
                        ),
                        a = e.querySelector(
                            '[data-kt-inbox-message="preview"]'
                        ),
                        n = e.querySelector(
                            '[data-kt-inbox-message="details"]'
                        ),
                        o = e.querySelector(
                            '[data-kt-inbox-message="message"]'
                        ),
                        r = new bootstrap.Collapse(o, { toggle: !1 });
                    t.addEventListener("click", (e) => {
                        e.target.closest('[data-kt-menu-trigger="click"]') ||
                            e.target.closest(".btn") ||
                            (a.classList.toggle("d-none"),
                            n.classList.toggle("d-none"),
                            r.toggle());
                    });
                }),
                (() => {
                    const r = document.querySelector("#kt_inbox_reply_form"),
                        l = r.querySelectorAll('[data-kt-inbox-form="tagify"]');
                    e(r),
                        t(r),
                        l.forEach((e) => {
                            a(e);
                        }),
                        n(r),
                        o(r);
                })();
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTAppInboxReply.init();
});
