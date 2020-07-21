(function (b, c, x, z) {
    function p() {
        var a = b(c).height();
        l && !m && a > b(c).width() && (a *= 0.75);
        b(".slideshow div").height(a);
    }
    function h(b, c) {
        d && m && d.length && 0 == c && ((e = !0), a());
    }
    function q() {
        n("49%", 150);
    }
    function f() {
        e && n("50%", 150);
    }
    function a() {
        if (l) {
            var a = b(".slick-prev");
            l.removeClass("hidden");
            m
                ? (g.show(),
                  a.hide(),
                  r(e),
                  e ? (g.fadeIn(), a.fadeOut(), n("50%"), g.on("mouseenter", q), g.on("mouseleave", f)) : (g.fadeOut(), a.fadeIn(), l.addClass("hidden"), n(0), g.off("mouseenter", q), g.off("mouseleave", f)),
                  (v = !0),
                  c.enableSmartMenu(!0))
                : (g.hide(), a.show(), n(0), g.off("mouseenter", q), g.off("mouseleave", f), r(!1), c.enableSmartMenu(!1));
            p();
        } else c.enableSmartMenu(m);
    }
    function n(b, a) {
        v ? d.animate({ left: b }, a) : d.css({ left: b }, a);
    }
    function r(a) {
        for (var e = b(".footer__links > li"), c = 0; 4 > c; c++) a ? e.eq(c).addClass("dark") : e.eq(c).removeClass("dark");
    }
    var k,
        d,
        l,
        g,
        e = !0,
        m = !1,
        v = !1;
    b(function () {
        k = b(".slideshow");
        k.children();
        k.slick({ speed: 500, onAfterChange: h, accessibility: !1 });
        k.find(".slick-prev").on("mousedown", function () {
            0 == k.slickCurrentSlide() && ((e = !0), a());
        });
        p();
        b(c).on("resize", p);
        d = b(".scroller");
        if (d.length) {
            l = b(".poster");
            g = b(".scroller__launcher");
            b("body").addClass("fade-gradient");
            g.on("click", function () {
                e = !1;
                a();
            });
            var f = l.find(".poster__title");
            f.css({ cursor: "pointer" });
            f.on("click", function () {
                m && (0 == k.slickCurrentSlide() ? ((e = !0), a()) : k.slickGoTo(0));
            });
            a();
        }
        enquire.register("screen and (min-width: 770px)", {
            match: function () {
                m = e = !0;
                a();
            },
            unmatch: function () {
                m = !1;
                a();
            },
        });
    });
})(jQuery, window, document);
(function (b, c, x, z) {
    b(function () {
        b(".slideshow-overlay__closer").on("click", function (c) {
            c.preventDefault();
            b(this).parent(".slideshow-overlay").fadeOut();
        });
    });
})(jQuery, window, document);
(function (b, c, x, z) {
    function p() {
        var b = f.offset();
        a.css({ top: b.top + f.height(), left: b.left + f.width() / 2 - a.outerWidth() / 2 });
    }
    function h() {
        p();
        a.stop().fadeIn();
    }
    function q() {
        a.stop().fadeOut();
    }
    var f, a;
    b(function () {
        a = b(".js-book-tooltip");
        a.length &&
            ((f = b(".js-book-tooltip-trigger")),
            enquire.register("screen and (min-width: 770px)", {
                match: function () {
                    f.on("mouseenter", h).on("mouseleave", q);
                    b(c).on("resize", p);
                    a.css({ display: "none" });
                },
                unmatch: function () {
                    f.off("mouseenter", h).off("mouseleave", q);
                    b(c).off("resize", p);
                    a.css({ top: "", left: "" });
                    b("body.home").length || a.css({ display: "block" });
                },
            }));
    });
})(jQuery, window, document);

(function (b, c, x, z) {
    function p(a) {
        k || "#" != b(this).attr("href") || (a.preventDefault(), b(this).siblings("ul").slideToggle());
    }
    function h(e) {
        d = !d;
        var f = b(c).height(),
            g = n.outerHeight(),
            g = d ? f : g;
        a.removeClass("is-open is-close");
        a.addClass("is-toggling");
        !0 === e ? (a.css({ height: g }), q()) : (d || a.css({ height: f }), a.animate({ height: g }, { complete: q }));
    }
    function q() {
        a.css({ height: "" });
        a.removeClass("is-toggling");
        d ? (b("html, body").addClass("scroll-lock"), a.addClass("is-open")) : (b("html, body").removeClass("scroll-lock"), a.removeClass("is-open"));
    }
    var f,
        a,
        n,
        r,
        k = !1,
        d = !1,
        l = !1,
        g;
    b(function () {
        f = b("#js-footer-menu");
        a = b("#js-mobile-menu");
        n = b(".js-mobile-menu-toggler");
        r = f.children("li");
        r.children("a").on("click", p);
        l = !0;
        b(".js-overlay-toggler").on("click", function () {
            b(".slideshow-overlay").fadeIn();
        });
        c.enableSmartMenu(g);
    });
    c.enableSmartMenu = function (b) {
        b !== k &&
            (l
                ? (k = b)
                    ? (f.addClass("sm sm-blue layout layout--flush"),
                      r.addClass("layout__item 1/8"),
                      d && h(!0),
                      a.css({ height: "" }),
                      f.smartmenus({
                          bottomToTopSubMenus: !0,
                          hideOnClick: !1,
                          subIndicators: !1,
                          subMenusMinWidth: "100%",
                          subMenusMaxWidth: "100%",
                          showFunction: function (a, b) {
                              a.fadeIn("fast", b);
                          },
                      }),
                      r.find("ul").show(),
                      n.off("click", h))
                    : (f.smartmenus("destroy"), f.removeClass("sm sm-blue layout layout--flush"), r.removeClass("layout__item 1/8"), r.find("ul").hide(), n.on("click", h))
                : (g = b));
    };
})(jQuery, window, document);
(function (b, c, x, z) {
    b(function () {
        b(".slideshow__item").attr("title", "");
    });
})(jQuery, window, document);
