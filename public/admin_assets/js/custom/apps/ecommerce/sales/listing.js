"use strict";
var KTAppEcommerceSalesListing = (function () {
    var e,
        t,
        n,
        r,
        o,
        a = (e, n, a) => {
            (r = e[0] ? new Date(e[0]) : null),
                (o = e[1] ? new Date(e[1]) : null),
                $.fn.dataTable.ext.search.push(function (e, t, n) {
                    var a = r,
                        c = o,
                        l = new Date(moment($(t[5]).text(), "DD/MM/YYYY")),
                        u = new Date(moment($(t[6]).text(), "DD/MM/YYYY"));
                    return (
                        (null === a && null === c) ||
                        (null === a && c >= u) ||
                        (a <= l && null === c) ||
                        (a <= l && c >= u)
                    );
                }),
                t.draw();
        },
        c = () => {
            e.querySelectorAll(
                '[data-kt-ecommerce-order-filter="approve_row"]'
            ).forEach((element) => {
                element.addEventListener("click", function (event) {
                    event.preventDefault();
                    const row = event.target.closest("tr");
                    const orderId = row.querySelector(
                        '[data-kt-ecommerce-order-filter="order_id"]'
                    ).innerText;

                    Swal.fire({
                        html: `Are you sure you want to approve application: <span style='color: blue'>${orderId}</span>?`,
                        icon: "info",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, approve!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-success",
                            cancelButton:
                                "btn fw-bold btn-active-light-primary",
                        },
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const csrfToken = document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content");
                            fetch("/admin/approve/application/" + orderId, {
                                method: "GET",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": csrfToken,
                                },
                            })
                                .then((response) => {
                                    if (response.ok) {
                                        return response.json();
                                    }
                                    throw new Error(
                                        "Error approving application"
                                    );
                                })
                                .then((data) => {
                                    Swal.fire({
                                        html: `You have approved application: <span style='color: blue'>${orderId}</span>?`,
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton:
                                                "btn fw-bold btn-primary",
                                        },
                                    }).then(() => {
                                        location.reload();
                                    });
                                })
                                .catch((error) => {
                                    console.error("Error:", error);
                                    Swal.fire({
                                        text:
                                            "Error approving " +
                                            orderId +
                                            ". Please try again later.",
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton:
                                                "btn fw-bold btn-primary",
                                        },
                                    });
                                });
                        }
                    });
                });
            });

            e.querySelectorAll(
                '[data-kt-ecommerce-order-filter="reject_row"]'
            ).forEach((element) => {
                element.addEventListener("click", function (event) {
                    event.preventDefault();
                    const row = event.target.closest("tr");
                    const orderId = row.querySelector(
                        '[data-kt-ecommerce-order-filter="order_id"]'
                    ).innerText;

                    Swal.fire({
                        html: `Are you sure you want to reject application: <span style='color: blue'>${orderId}</span>?`,
                        icon: "info",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, reject!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton:
                                "btn fw-bold btn-active-light-primary",
                        },
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const csrfToken = document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content");
                            fetch("/admin/reject/application/" + orderId, {
                                method: "GET",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": csrfToken,
                                },
                            })
                                .then((response) => {
                                    if (response.ok) {
                                        return response.json();
                                    }
                                    throw new Error(
                                        "Error rejecting application"
                                    );
                                })
                                .then((data) => {
                                    Swal.fire({
                                        html: `You have rejected application: <span style='color: blue'>${orderId}</span>?`,
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton:
                                                "btn fw-bold btn-primary",
                                        },
                                    }).then(() => {
                                        location.reload();
                                    });
                                })
                                .catch((error) => {
                                    console.error("Error:", error);
                                    Swal.fire({
                                        text:
                                            "Error rejecting " +
                                            orderId +
                                            ". Please try again later.",
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton:
                                                "btn fw-bold btn-primary",
                                        },
                                    });
                                });
                        }
                    });
                });
            });

            e.querySelectorAll(
                '[data-kt-ecommerce-order-filter="delete_row"]'
            ).forEach((element) => {
                element.addEventListener("click", function (event) {
                    event.preventDefault();
                    const row = event.target.closest("tr");
                    const orderId = row.querySelector(
                        '[data-kt-ecommerce-order-filter="order_id"]'
                    ).innerText;

                    Swal.fire({
                        html: `Are you sure you want to delete application: <span style='color: blue'>${orderId}</span>?`,
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, delete!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton:
                                "btn fw-bold btn-active-light-primary",
                        },
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const csrfToken = document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content");
                            fetch("/admin/delete/application/" + orderId, {
                                method: "DELETE",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": csrfToken,
                                },
                            })
                                .then((response) => {
                                    if (response.ok) {
                                        return response.json();
                                    }
                                    throw new Error(
                                        "Error deleting application"
                                    );
                                })
                                .then((data) => {
                                    Swal.fire({
                                        html: `You have deleted application: <span style='color: blue'>${orderId}</span>?`,
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton:
                                                "btn fw-bold btn-primary",
                                        },
                                    }).then(() => {
                                        t.row($(row)).remove().draw();
                                    });
                                })
                                .catch((error) => {
                                    console.error("Error:", error);
                                    Swal.fire({
                                        text:
                                            "Error deleting " +
                                            orderId +
                                            ". Please try again later.",
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton:
                                                "btn fw-bold btn-primary",
                                        },
                                    });
                                });
                        }
                    });
                });
            });
        };

    return {
        init: function () {
            (e = document.querySelector("#kt_ecommerce_sales_table")) &&
                ((t = $(e).DataTable({
                    info: !1,
                    order: [],
                    pageLength: 10,
                    columnDefs: [
                        { orderable: !1, targets: 0 },
                        { orderable: !1, targets: 7 },
                    ],
                })).on("draw", function () {
                    c();
                }),
                (() => {
                    const e = document.querySelector(
                        "#kt_ecommerce_sales_flatpickr"
                    );
                    n = $(e).flatpickr({
                        altInput: !0,
                        altFormat: "d/m/Y",
                        dateFormat: "Y-m-d",
                        mode: "range",
                        onChange: function (e, t, n) {
                            a(e, t, n);
                        },
                    });
                })(),
                document
                    .querySelector('[data-kt-ecommerce-order-filter="search"]')
                    .addEventListener("keyup", function (e) {
                        t.search(e.target.value).draw();
                    }),
                (() => {
                    const e = document.querySelector(
                        '[data-kt-ecommerce-order-filter="status"]'
                    );
                    $(e).on("change", (e) => {
                        let n = e.target.value;
                        "all" === n && (n = ""), t.column(3).search(n).draw();
                    });
                })(),
                c(),
                document
                    .querySelector("#kt_ecommerce_sales_flatpickr_clear")
                    .addEventListener("click", (e) => {
                        n.clear();
                    }));
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceSalesListing.init();
});
