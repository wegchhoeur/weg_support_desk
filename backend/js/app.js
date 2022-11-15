! function(t) {
    "use strict";
    var e = function() {
        this.$body = t("body"), this.$window = t(window)
    };
    e.prototype.initSelect2 = function() {
        t('[data-toggle="select2"]').select2()
    }, e.prototype.initMask = function() {
        t('[data-toggle="input-mask"]').each(function(e, n) {
            var i = t(n).data("maskFormat"),
                o = t(n).data("reverse");
            null != o ? t(n).mask(i, {
                reverse: o
            }) : t(n).mask(i)
        })
    }, e.prototype.initDateRange = function() {
        var e = {
            cancelClass: "btn-light",
            applyButtonClasses: "btn-success"
        };
        t('[data-toggle="date-picker"]').each(function(n, i) {
            var o = t.extend({}, e, t(i).data());
            t(i).daterangepicker(o)
        });
        var n = {
            startDate: moment().subtract(29, "days"),
            endDate: moment(),
            ranges: {
                Today: [moment(), moment()],
                Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                "Last 7 Days": [moment().subtract(6, "days"), moment()],
                "Last 30 Days": [moment().subtract(29, "days"), moment()],
                "This Month": [moment().startOf("month"), moment().endOf("month")],
                "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
            }
        };
        t('[data-toggle="date-picker-range"]').each(function(e, i) {
            var o = t.extend({}, n, t(i).data()),
                a = o.targetDisplay;
            t(i).daterangepicker(o, function(e, n) {
                a && t(a).html(e.format("MMMM D, YYYY") + " - " + n.format("MMMM D, YYYY"))
            })
        })
    }, e.prototype.init = function() {
        this.initSelect2(), this.initMask(), this.initDateRange()
    }, t.AdvanceFormApp = new e, t.AdvanceFormApp.Constructor = e
}(window.jQuery),
function(t) {
    "use strict";
    var e = function() {};
    e.prototype.initTooltipPlugin = function() {
        t.fn.tooltip && t('[data-toggle="tooltip"]').tooltip()
    }, e.prototype.initPopoverPlugin = function() {
        t.fn.popover && t('[data-toggle="popover"]').popover()
    }, e.prototype.initCustomSelect = function() {
        t('[data-plugin="customselect"]').niceSelect()
    }, e.prototype.initSlimScrollPlugin = function() {
        t.fn.slimScroll && t(".slimscroll").slimScroll({
            height: "auto",
            position: "right",
            size: "8px",
            touchScrollStep: 20,
            color: "#9ea5ab"
        })
    }, e.prototype.initFormValidation = function() {
        t(".needs-validation").on("submit", function(e) {
            return t(this).addClass("was-validated"), !1 !== t(this)[0].checkValidity() || (e.preventDefault(), e.stopPropagation(), !1)
        })
    }, e.prototype.init = function() {
        this.initTooltipPlugin(), this.initPopoverPlugin(), this.initCustomSelect(), this.initSlimScrollPlugin(), this.initFormValidation()
    }, t.Components = new e, t.Components.Constructor = e
}(window.jQuery),
function(t) {
    "use strict";
    var e = function() {
        this.$body = t("body"), this.$window = t(window)
    };
    e.prototype.initMenu = function() {
        var e = this;
        t(".button-menu-mobile").on("click", function(n) {
            n.preventDefault(), e.$window.width() < 768 && e.$body.toggleClass("sidebar-enable"), t(".slimscroll-menu").slimscroll({
                height: "auto",
                position: "right",
                size: "8px",
                color: "#9ea5ab",
                wheelStep: 5,
                touchScrollStep: 20
            })
        }), t("#side-menu").metisMenu(), t(".slimscroll-menu").slimscroll({
            height: "auto",
            position: "right",
            size: "8px",
            color: "#9ea5ab",
            wheelStep: 5,
            touchScrollStep: 20
        }), t(".right-bar-toggle").on("click", function(e) {
            t("body").toggleClass("right-bar-enabled")
        }), t(document).on("click", "body", function(e) {
            t(e.target).closest(".right-bar-toggle, .right-bar").length > 0 || t(e.target).closest(".left-side-menu, #sidebar-menu").length > 0 || t(e.target).hasClass("button-menu-mobile") || t(e.target).closest(".button-menu-mobile").length > 0 || (t("body").removeClass("right-bar-enabled"), t("body").removeClass("sidebar-enable"))
        }), t("#sidebar-menu a").each(function() {
            var e = window.location.href.split(/[?#]/)[0];
            this.href == e && (t(this).addClass("active"), t(this).parent().addClass("active"), t(this).parent().parent().addClass("in"), t(this).parent().parent().prev().addClass("active"), t(this).parent().parent().parent().addClass("active"), t(this).parent().parent().parent().parent().addClass("in"), t(this).parent().parent().parent().parent().parent().addClass("active"))
        })
    }, e.prototype.initLayout = function() {
        this.$window.width() >= 768 && this.$window.width() <= 1028 ? this.$body.addClass("enlarged") : 1 != this.$body.data("keep-enlarged") && this.$body.removeClass("enlarged")
    }, e.prototype.init = function() {
        var e = this;
        this.initLayout(), this.initMenu(), t.AdvanceFormApp.init(), t.Components.init(), e.$window.on("resize", function(t) {
            t.preventDefault(), console.log("resized"), e.initLayout()
        })
    }, t.App = new e, t.App.Constructor = e
}(window.jQuery),
function(t) {
    "use strict";
    t.App.init()
}(window.jQuery);
//# sourceMappingURL=app.min.js.map



// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


// Text Editor Plugin
$(document).ready(function() {
	"use strict";
    $('.summernote').summernote({
      height: 200,
      toolbar: [
            ["style", ["style"]],
            ["font", ["bold", "italic", "underline", "clear"]],
            //["font", ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ["fontname", ["fontname"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["table", ["table"]],
            ["insert", ["link"]],
            //["insert", ["picture", "video"]],
            //["view", ["fullscreen", "codeview", "help"]],
            //['height', ['height']]
        ],
        
      // Clean text formatting
      callbacks: {
        onPaste: function (e) {
            var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

            e.preventDefault();

            // Firefox fix
            setTimeout(function () {
                document.execCommand('insertText', false, bufferText);
            }, 10);
        }
      }

    });

    $('.textMediaEditor').summernote({
      height: 200,
      toolbar: [
            ["style", ["style"]],
            ["font", ["bold", "italic", "underline", "clear"]],
            //["font", ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ["fontname", ["fontname"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["table", ["table"]],
            ["insert", ["link", "picture", "video"]],
            //["view", ["fullscreen", "codeview", "help"]],
            //['height', ['height']]
        ],

      // Clean text formatting
      callbacks: {
        onPaste: function (e) {
            var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

            e.preventDefault();

            // Firefox fix
            setTimeout(function () {
                document.execCommand('insertText', false, bufferText);
            }, 10);
        }
      }

    });
});


// Data Table Init
$(document).ready(function() {
	"use strict";
    $('#basic-datatable').DataTable();
} );


// Button switcher
! function(e) {
    "use strict";
    var a = function() {};
    a.prototype.initSwitchery = function() {
        e('[data-plugin="switchery"]').each(function(a, t) {
            new Switchery(e(this)[0], e(this).data())
        })
    }, a.prototype.initMaxLength = function() {
        e("input#defaultconfig").maxlength({
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger"
        }), e("input#thresholdconfig").maxlength({
            threshold: 20,
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger"
        }), e("input#alloptions").maxlength({
            alwaysShow: !0,
            separator: " out of ",
            preText: "You typed ",
            postText: " chars available.",
            validate: !0,
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger"
        }), e("textarea#textarea").maxlength({
            alwaysShow: !0,
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger"
        }), e("input#placement").maxlength({
            alwaysShow: !0,
            placement: "top-left",
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger"
        })
    }, a.prototype.init = function() {
        this.initSwitchery(), this.initMaxLength()
    }, e.Components = new a, e.Components.Constructor = a
}(window.jQuery),
function(e) {
    "use strict";
    e.Components.init()
}(window.jQuery);