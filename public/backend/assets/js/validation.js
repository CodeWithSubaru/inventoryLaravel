$(document).ready(function () {
    // Blog Form
    $("#addBlogForm").validate({
        rules: {
            name: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Please enter your name",
            },
        },
        errorElement: "span",
        errorPlacement: function (err, el) {
            err.addClass("invalid-feedback");
            el.closest(".form-group").append(err);
        },
        highlight: function (el, errClass, validClass) {
            $(el).addClass("is-invalid");
        },
        unhighlight: function (el, errClass, validClass) {
            $(el).removeClass("is-invalid");
        },
    });

    // Supplier Form
    $("#addSupplierForm").validate({
        rules: {
            name: {
                required: true,
            },

            mobile_no: {
                required: true,
            },

            email: {
                required: true,
            },

            address: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Please enter your name",
            },

            mobile_no: {
                required: "Please enter your mobile number",
            },
            email: {
                required: "Please enter your email",
            },

            address: {
                required: "Please enter your address",
            },
        },
        errorElement: "span",
        errorPlacement: function (err, el) {
            err.addClass("invalid-feedback");
            el.closest(".form-group").append(err);
        },
        highlight: function (el, errorClass, validClass) {
            $(el).addClass("is-invalid");
        },
        unhighlight: function (el, errorClass, validClass) {
            $(el).removeClass("is-invalid");
        },
    });

    // Supplier Form
    $("#addCustomerForm").validate({
        rules: {
            name: {
                required: true,
            },

            mobile_no: {
                required: true,
            },

            email: {
                required: true,
            },

            address: {
                required: true,
            },
            image: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Please enter your name",
            },

            mobile_no: {
                required: "Please enter your mobile number",
            },
            email: {
                required: "Please enter your email",
            },

            address: {
                required: "Please enter your address",
            },
            image: {
                required: "Please choose your image",
            },
        },
        errorElement: "span",
        errorPlacement: function (err, el) {
            err.addClass("invalid-feedback");
            el.closest(".form-group").append(err);
        },
        highlight: function (el, errorClass, validClass) {
            $(el).addClass("is-invalid");
        },
        unhighlight: function (el, errorClass, validClass) {
            $(el).removeClass("is-invalid");
        },
    });

    // Unit
    $("#addUnitForm").validate({
        rules: {
            name: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Please enter your name",
            },
        },
        errorElement: "span",
        errorPlacement: function (err, el) {
            err.addClass("invalid-feedback");
            el.closest(".form-group").append(err);
        },
        highlight: function (el, errClass, validClass) {
            $(el).addClass("is-invalid");
        },
        unhighlight: function (el, errClass, validClass) {
            $(el).removeClass("is-invalid");
        },
    });
    // Category
    $("#addCategoryForm").validate({
        rules: {
            name: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Please enter your name",
            },
        },
        errorElement: "span",
        errorPlacement: function (err, el) {
            err.addClass("invalid-feedback");
            el.closest(".form-group").append(err);
        },
        highlight: function (el, errClass, validClass) {
            $(el).addClass("is-invalid");
        },
        unhighlight: function (el, errClass, validClass) {
            $(el).removeClass("is-invalid");
        },
    });
});
