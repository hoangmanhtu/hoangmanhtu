// /*!
//  * @name        image-zoom
//  * @author      Matt Hinchliffe <http://maketea.co.uk>
//  * @modified    Thursday, April 24th, 2014
//  * @version     2.1.0
//  */
// ! function(a) {
//     "use strict";

//     function b(b, c) { return this.$target = a(b), this.opts = a.extend({}, i, c), void 0 === this.isOpen && this._init(), this }
//     var c, d, e, f, g, h, i = { loadingNotice: "Loading image", errorNotice: "The image could not be loaded", preventClicks: !0, onShow: void 0, onHide: void 0 };
//     b.prototype._init = function() {
//         var b = this;
//         this.$link = this.$target.find("a"), this.$image = this.$target.find("img"), this.$flyout = a('<div class="easyzoom-flyout" />'), this.$notice = a('<div class="easyzoom-notice" />'), this.$target.on("mouseenter.easyzoom touchstart.easyzoom", function(a) { a.originalEvent.touches && 1 !== a.originalEvent.touches.length || (a.preventDefault(), b.show(a)) }).on("mousemove.easyzoom touchmove.easyzoom", function(a) { b.isOpen && (a.preventDefault(), b._move(a)) }).on("mouseleave.easyzoom touchend.easyzoom", function() { b.isOpen && b.hide() }), this.opts.preventClicks && this.$target.on("click.easyzoom", "a", function(a) { a.preventDefault() })
//     }, b.prototype.show = function(a) { var b, g, h, i, j = this; return this.isReady ? (this.$target.append(this.$flyout), b = this.$target.width(), g = this.$target.height(), h = this.$flyout.width(), i = this.$flyout.height(), c = this.$zoom.width() - h, d = this.$zoom.height() - i, e = c / b, f = d / g, this.isOpen = !0, this.opts.onShow && this.opts.onShow.call(this), void(a && this._move(a))) : void this._load(this.$link.attr("href"), function() { j.show(a) }) }, b.prototype._load = function(b, c) {
//         var d = this,
//             e = new Image;
//         this.$target.addClass("is-loading").append(this.$notice.text(this.opts.loadingNotice)), this.$zoom = a(e), e.onerror = function() { d.$notice.text(d.opts.errorNotice), d.$target.removeClass("is-loading").addClass("is-error") }, e.onload = function() { 0 !== e.width && (d.isReady = !0, d.$notice.detach(), d.$flyout.html(d.$zoom), d.$target.removeClass("is-loading").addClass("is-ready"), c()) }, e.style.position = "absolute", e.src = b
//     }, b.prototype._move = function(a) {
//         if (0 === a.type.indexOf("touch")) {
//             var b = a.touches || a.originalEvent.touches;
//             g = b[0].pageX, h = b[0].pageY
//         } else g = a.pageX || g, h = a.pageY || h;
//         var i = this.$target.offset(),
//             j = h - i.top,
//             k = g - i.left,
//             l = j * f,
//             m = k * e;
//         0 > m || 0 > l || m > c || l > d ? this.hide() : this.$zoom.css({ top: "" + -1 * Math.ceil(l) + "px", left: "" + -1 * Math.ceil(m) + "px" })
//     }, b.prototype.hide = function() { this.isOpen && (this.$flyout.detach(), this.isOpen = !1, this.opts.onHide && this.opts.onHide.call(this)) }, b.prototype.swap = function(a, b) { this.hide(), this.isReady = !1, this.$target.removeClass("is-loading is-ready is-error"), this.$image.attr("src", a), this.$link.attr("href", b) }, b.prototype.teardown = function() { this.hide(), this.$target.removeClass("is-loading is-ready is-error").off(".easyzoom"), delete this.$link, delete this.$zoom, delete this.$image, delete this.$notice, delete this.$flyout, delete this.isOpen, delete this.isReady }, a.fn.easyZoom = function(c) {
//         return this.each(function() {
//             var d = a.data(this, "easyZoom");
//             d ? void 0 === d.isOpen && d._init() : a.data(this, "easyZoom", new b(this, c))
//         })
//     }, "function" == typeof define && define.amd ? define(function() { return b }) : "undefined" != typeof module && module.exports && (module.exports = b)
// }(jQuery);