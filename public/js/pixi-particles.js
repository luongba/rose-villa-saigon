this.PIXI = this.PIXI || {};
(function (exports, pixi) {
    "use strict";
    var PropertyNode = (function () {
        function PropertyNode(value, time, ease) {
            this.value = value;
            this.time = time;
            this.next = null;
            this.isStepped = false;
            if (ease) {
                this.ease = typeof ease == "function" ? ease : exports.ParticleUtils.generateEase(ease);
            } else {
                this.ease = null;
            }
        }
        PropertyNode.createList = function (data) {
            if ("list" in data) {
                var array = data.list;
                var node = void 0,
                    first = void 0;
                var _a = array[0],
                    value = _a.value,
                    time = _a.time;
                first = node = new PropertyNode(typeof value === "string" ? exports.ParticleUtils.hexToRGB(value) : value, time, data.ease);
                if (array.length > 2 || (array.length === 2 && array[1].value !== value)) {
                    for (var i = 1; i < array.length; ++i) {
                        var _b = array[i],
                            value_1 = _b.value,
                            time_1 = _b.time;
                        node.next = new PropertyNode(typeof value_1 === "string" ? exports.ParticleUtils.hexToRGB(value_1) : value_1, time_1);
                        node = node.next;
                    }
                }
                first.isStepped = !!data.isStepped;
                return first;
            } else {
                var start = new PropertyNode(typeof data.start === "string" ? exports.ParticleUtils.hexToRGB(data.start) : data.start, 0);
                if (data.end !== data.start) start.next = new PropertyNode(typeof data.end === "string" ? exports.ParticleUtils.hexToRGB(data.end) : data.end, 1);
                return start;
            }
        };
        return PropertyNode;
    })();
    var TextureFromString;
    var pixiNS = pixi;
    if (parseInt(/^(\d+)\./.exec(PIXI.VERSION)[1]) < 5) {
        TextureFromString = pixiNS.Texture.fromImage;
    } else {
        TextureFromString = pixiNS.Texture.from;
    }
    function GetTextureFromString(s) {
        return TextureFromString(s);
    }
    (function (ParticleUtils) {
        ParticleUtils.verbose = false;
        ParticleUtils.DEG_TO_RADS = Math.PI / 180;
        function rotatePoint(angle, p) {
            if (!angle) return;
            angle *= ParticleUtils.DEG_TO_RADS;
            var s = Math.sin(angle);
            var c = Math.cos(angle);
            var xnew = p.x * c - p.y * s;
            var ynew = p.x * s + p.y * c;
            p.x = xnew;
            p.y = ynew;
        }
        ParticleUtils.rotatePoint = rotatePoint;
        function combineRGBComponents(r, g, b) {
            return (r << 16) | (g << 8) | b;
        }
        ParticleUtils.combineRGBComponents = combineRGBComponents;
        function normalize(point) {
            var oneOverLen = 1 / ParticleUtils.length(point);
            point.x *= oneOverLen;
            point.y *= oneOverLen;
        }
        ParticleUtils.normalize = normalize;
        function scaleBy(point, value) {
            point.x *= value;
            point.y *= value;
        }
        ParticleUtils.scaleBy = scaleBy;
        function length(point) {
            return Math.sqrt(point.x * point.x + point.y * point.y);
        }
        ParticleUtils.length = length;
        function hexToRGB(color, output) {
            if (!output) output = {};
            if (color.charAt(0) == "#") color = color.substr(1);
            else if (color.indexOf("0x") === 0) color = color.substr(2);
            var alpha;
            if (color.length == 8) {
                alpha = color.substr(0, 2);
                color = color.substr(2);
            }
            output.r = parseInt(color.substr(0, 2), 16);
            output.g = parseInt(color.substr(2, 2), 16);
            output.b = parseInt(color.substr(4, 2), 16);
            if (alpha) output.a = parseInt(alpha, 16);
            return output;
        }
        ParticleUtils.hexToRGB = hexToRGB;
        function generateEase(segments) {
            var qty = segments.length;
            var oneOverQty = 1 / qty;
            return function (time) {
                var t, s;
                var i = (qty * time) | 0;
                t = (time - i * oneOverQty) * qty;
                s = segments[i] || segments[qty - 1];
                return s.s + t * (2 * (1 - t) * (s.cp - s.s) + t * (s.e - s.s));
            };
        }
        ParticleUtils.generateEase = generateEase;
        function getBlendMode(name) {
            if (!name) return pixi.BLEND_MODES.NORMAL;
            name = name.toUpperCase();
            while (name.indexOf(" ") >= 0) name = name.replace(" ", "_");
            return pixi.BLEND_MODES[name] || pixi.BLEND_MODES.NORMAL;
        }
        ParticleUtils.getBlendMode = getBlendMode;
        function createSteppedGradient(list, numSteps) {
            if (numSteps === void 0) {
                numSteps = 10;
            }
            if (typeof numSteps !== "number" || numSteps <= 0) numSteps = 10;
            var first = new PropertyNode(ParticleUtils.hexToRGB(list[0].value), list[0].time);
            first.isStepped = true;
            var currentNode = first;
            var current = list[0];
            var nextIndex = 1;
            var next = list[nextIndex];
            for (var i = 1; i < numSteps; ++i) {
                var lerp = i / numSteps;
                while (lerp > next.time) {
                    current = next;
                    next = list[++nextIndex];
                }
                lerp = (lerp - current.time) / (next.time - current.time);
                var curVal = ParticleUtils.hexToRGB(current.value);
                var nextVal = ParticleUtils.hexToRGB(next.value);
                var output = { r: (nextVal.r - curVal.r) * lerp + curVal.r, g: (nextVal.g - curVal.g) * lerp + curVal.g, b: (nextVal.b - curVal.b) * lerp + curVal.b };
                currentNode.next = new PropertyNode(output, i / numSteps);
                currentNode = currentNode.next;
            }
            return first;
        }
        ParticleUtils.createSteppedGradient = createSteppedGradient;
    })(exports.ParticleUtils || (exports.ParticleUtils = {}));
    var extendStatics = function (d, b) {
        extendStatics =
            Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array &&
                function (d, b) {
                    d.__proto__ = b;
                }) ||
            function (d, b) {
                for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
            };
        return extendStatics(d, b);
    };
    function __extends(d, b) {
        extendStatics(d, b);
        function __() {
            this.constructor = d;
        }
        d.prototype = b === null ? Object.create(b) : ((__.prototype = b.prototype), new __());
    }
    var __assign = function () {
        __assign =
            Object.assign ||
            function __assign(t) {
                for (var s, i = 1, n = arguments.length; i < n; i++) {
                    s = arguments[i];
                    for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p)) t[p] = s[p];
                }
                return t;
            };
        return __assign.apply(this, arguments);
    };
    function __rest(s, e) {
        var t = {};
        for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p) && e.indexOf(p) < 0) t[p] = s[p];
        if (s != null && typeof Object.getOwnPropertySymbols === "function") for (var i = 0, p = Object.getOwnPropertySymbols(s); i < p.length; i++) if (e.indexOf(p[i]) < 0) t[p[i]] = s[p[i]];
        return t;
    }
    function __decorate(decorators, target, key, desc) {
        var c = arguments.length,
            r = c < 3 ? target : desc === null ? (desc = Object.getOwnPropertyDescriptor(target, key)) : desc,
            d;
        if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
        else for (var i = decorators.length - 1; i >= 0; i--) if ((d = decorators[i])) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
        return c > 3 && r && Object.defineProperty(target, key, r), r;
    }
    function __param(paramIndex, decorator) {
        return function (target, key) {
            decorator(target, key, paramIndex);
        };
    }
    function __metadata(metadataKey, metadataValue) {
        if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(metadataKey, metadataValue);
    }
    function __awaiter(thisArg, _arguments, P, generator) {
        return new (P || (P = Promise))(function (resolve, reject) {
            function fulfilled(value) {
                try {
                    step(generator.next(value));
                } catch (e) {
                    reject(e);
                }
            }
            function rejected(value) {
                try {
                    step(generator["throw"](value));
                } catch (e) {
                    reject(e);
                }
            }
            function step(result) {
                result.done
                    ? resolve(result.value)
                    : new P(function (resolve) {
                          resolve(result.value);
                      }).then(fulfilled, rejected);
            }
            step((generator = generator.apply(thisArg, _arguments || [])).next());
        });
    }
    function __generator(thisArg, body) {
        var _ = {
                label: 0,
                sent: function () {
                    if (t[0] & 1) throw t[1];
                    return t[1];
                },
                trys: [],
                ops: [],
            },
            f,
            y,
            t,
            g;
        return (
            (g = { next: verb(0), throw: verb(1), return: verb(2) }),
            typeof Symbol === "function" &&
                (g[Symbol.iterator] = function () {
                    return this;
                }),
            g
        );
        function verb(n) {
            return function (v) {
                return step([n, v]);
            };
        }
        function step(op) {
            if (f) throw new TypeError("Generator is already executing.");
            while (_)
                try {
                    if (((f = 1), y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done)) return t;
                    if (((y = 0), t)) op = [op[0] & 2, t.value];
                    switch (op[0]) {
                        case 0:
                        case 1:
                            t = op;
                            break;
                        case 4:
                            _.label++;
                            return { value: op[1], done: false };
                        case 5:
                            _.label++;
                            y = op[1];
                            op = [0];
                            continue;
                        case 7:
                            op = _.ops.pop();
                            _.trys.pop();
                            continue;
                        default:
                            if (!((t = _.trys), (t = t.length > 0 && t[t.length - 1])) && (op[0] === 6 || op[0] === 2)) {
                                _ = 0;
                                continue;
                            }
                            if (op[0] === 3 && (!t || (op[1] > t[0] && op[1] < t[3]))) {
                                _.label = op[1];
                                break;
                            }
                            if (op[0] === 6 && _.label < t[1]) {
                                _.label = t[1];
                                t = op;
                                break;
                            }
                            if (t && _.label < t[2]) {
                                _.label = t[2];
                                _.ops.push(op);
                                break;
                            }
                            if (t[2]) _.ops.pop();
                            _.trys.pop();
                            continue;
                    }
                    op = body.call(thisArg, _);
                } catch (e) {
                    op = [6, e];
                    y = 0;
                } finally {
                    f = t = 0;
                }
            if (op[0] & 5) throw op[1];
            return { value: op[0] ? op[1] : void 0, done: true };
        }
    }
    function __exportStar(m, exports) {
        for (var p in m) if (!exports.hasOwnProperty(p)) exports[p] = m[p];
    }
    function __values(o) {
        var m = typeof Symbol === "function" && o[Symbol.iterator],
            i = 0;
        if (m) return m.call(o);
        return {
            next: function () {
                if (o && i >= o.length) o = void 0;
                return { value: o && o[i++], done: !o };
            },
        };
    }
    function __read(o, n) {
        var m = typeof Symbol === "function" && o[Symbol.iterator];
        if (!m) return o;
        var i = m.call(o),
            r,
            ar = [],
            e;
        try {
            while ((n === void 0 || n-- > 0) && !(r = i.next()).done) ar.push(r.value);
        } catch (error) {
            e = { error: error };
        } finally {
            try {
                if (r && !r.done && (m = i["return"])) m.call(i);
            } finally {
                if (e) throw e.error;
            }
        }
        return ar;
    }
    function __spread() {
        for (var ar = [], i = 0; i < arguments.length; i++) ar = ar.concat(__read(arguments[i]));
        return ar;
    }
    function __await(v) {
        return this instanceof __await ? ((this.v = v), this) : new __await(v);
    }
    function __asyncGenerator(thisArg, _arguments, generator) {
        if (!Symbol.asyncIterator) throw new TypeError("Symbol.asyncIterator is not defined.");
        var g = generator.apply(thisArg, _arguments || []),
            i,
            q = [];
        return (
            (i = {}),
            verb("next"),
            verb("throw"),
            verb("return"),
            (i[Symbol.asyncIterator] = function () {
                return this;
            }),
            i
        );
        function verb(n) {
            if (g[n])
                i[n] = function (v) {
                    return new Promise(function (a, b) {
                        q.push([n, v, a, b]) > 1 || resume(n, v);
                    });
                };
        }
        function resume(n, v) {
            try {
                step(g[n](v));
            } catch (e) {
                settle(q[0][3], e);
            }
        }
        function step(r) {
            r.value instanceof __await ? Promise.resolve(r.value.v).then(fulfill, reject) : settle(q[0][2], r);
        }
        function fulfill(value) {
            resume("next", value);
        }
        function reject(value) {
            resume("throw", value);
        }
        function settle(f, v) {
            if ((f(v), q.shift(), q.length)) resume(q[0][0], q[0][1]);
        }
    }
    function __asyncDelegator(o) {
        var i, p;
        return (
            (i = {}),
            verb("next"),
            verb("throw", function (e) {
                throw e;
            }),
            verb("return"),
            (i[Symbol.iterator] = function () {
                return this;
            }),
            i
        );
        function verb(n, f) {
            i[n] = o[n]
                ? function (v) {
                      return (p = !p) ? { value: __await(o[n](v)), done: n === "return" } : f ? f(v) : v;
                  }
                : f;
        }
    }
    function __asyncValues(o) {
        if (!Symbol.asyncIterator) throw new TypeError("Symbol.asyncIterator is not defined.");
        var m = o[Symbol.asyncIterator],
            i;
        return m
            ? m.call(o)
            : ((o = typeof __values === "function" ? __values(o) : o[Symbol.iterator]()),
              (i = {}),
              verb("next"),
              verb("throw"),
              verb("return"),
              (i[Symbol.asyncIterator] = function () {
                  return this;
              }),
              i);
        function verb(n) {
            i[n] =
                o[n] &&
                function (v) {
                    return new Promise(function (resolve, reject) {
                        (v = o[n](v)), settle(resolve, reject, v.done, v.value);
                    });
                };
        }
        function settle(resolve, reject, d, v) {
            Promise.resolve(v).then(function (v) {
                resolve({ value: v, done: d });
            }, reject);
        }
    }
    function __makeTemplateObject(cooked, raw) {
        if (Object.defineProperty) {
            Object.defineProperty(cooked, "raw", { value: raw });
        } else {
            cooked.raw = raw;
        }
        return cooked;
    }
    function __importStar(mod) {
        if (mod && mod.__esModule) return mod;
        var result = {};
        if (mod != null) for (var k in mod) if (Object.hasOwnProperty.call(mod, k)) result[k] = mod[k];
        result.default = mod;
        return result;
    }
    function __importDefault(mod) {
        return mod && mod.__esModule ? mod : { default: mod };
    }
    var PropertyList = (function () {
        function PropertyList(isColor) {
            if (isColor === void 0) {
                isColor = false;
            }
            this.current = null;
            this.next = null;
            this.isColor = !!isColor;
            this.interpolate = null;
            this.ease = null;
        }
        PropertyList.prototype.reset = function (first) {
            this.current = first;
            this.next = first.next;
            var isSimple = this.next && this.next.time >= 1;
            if (isSimple) {
                this.interpolate = this.isColor ? intColorSimple : intValueSimple;
            } else if (first.isStepped) {
                this.interpolate = this.isColor ? intColorStepped : intValueStepped;
            } else {
                this.interpolate = this.isColor ? intColorComplex : intValueComplex;
            }
            this.ease = this.current.ease;
        };
        return PropertyList;
    })();
    function intValueSimple(lerp) {
        if (this.ease) lerp = this.ease(lerp);
        return (this.next.value - this.current.value) * lerp + this.current.value;
    }
    function intColorSimple(lerp) {
        if (this.ease) lerp = this.ease(lerp);
        var curVal = this.current.value,
            nextVal = this.next.value;
        var r = (nextVal.r - curVal.r) * lerp + curVal.r;
        var g = (nextVal.g - curVal.g) * lerp + curVal.g;
        var b = (nextVal.b - curVal.b) * lerp + curVal.b;
        return exports.ParticleUtils.combineRGBComponents(r, g, b);
    }
    function intValueComplex(lerp) {
        if (this.ease) lerp = this.ease(lerp);
        while (lerp > this.next.time) {
            this.current = this.next;
            this.next = this.next.next;
        }
        lerp = (lerp - this.current.time) / (this.next.time - this.current.time);
        return (this.next.value - this.current.value) * lerp + this.current.value;
    }
    function intColorComplex(lerp) {
        if (this.ease) lerp = this.ease(lerp);
        while (lerp > this.next.time) {
            this.current = this.next;
            this.next = this.next.next;
        }
        lerp = (lerp - this.current.time) / (this.next.time - this.current.time);
        var curVal = this.current.value,
            nextVal = this.next.value;
        var r = (nextVal.r - curVal.r) * lerp + curVal.r;
        var g = (nextVal.g - curVal.g) * lerp + curVal.g;
        var b = (nextVal.b - curVal.b) * lerp + curVal.b;
        return exports.ParticleUtils.combineRGBComponents(r, g, b);
    }
    function intValueStepped(lerp) {
        if (this.ease) lerp = this.ease(lerp);
        while (this.next && lerp > this.next.time) {
            this.current = this.next;
            this.next = this.next.next;
        }
        return this.current.value;
    }
    function intColorStepped(lerp) {
        if (this.ease) lerp = this.ease(lerp);
        while (this.next && lerp > this.next.time) {
            this.current = this.next;
            this.next = this.next.next;
        }
        var curVal = this.current.value;
        return exports.ParticleUtils.combineRGBComponents(curVal.r, curVal.g, curVal.b);
    }
    var Particle = (function (_super) {
        __extends(Particle, _super);
        function Particle(emitter) {
            var _this = _super.call(this) || this;
            _this.emitter = emitter;
            _this.anchor.x = _this.anchor.y = 0.5;
            _this.velocity = new pixi.Point();
            _this.rotationSpeed = 0;
            _this.rotationAcceleration = 0;
            _this.maxLife = 0;
            _this.age = 0;
            _this.ease = null;
            _this.extraData = null;
            _this.alphaList = new PropertyList();
            _this.speedList = new PropertyList();
            _this.speedMultiplier = 1;
            _this.acceleration = new pixi.Point();
            _this.maxSpeed = NaN;
            _this.scaleList = new PropertyList();
            _this.scaleMultiplier = 1;
            _this.colorList = new PropertyList(true);
            _this._doAlpha = false;
            _this._doScale = false;
            _this._doSpeed = false;
            _this._doAcceleration = false;
            _this._doColor = false;
            _this._doNormalMovement = false;
            _this._oneOverLife = 0;
            _this.next = null;
            _this.prev = null;
            _this.init = _this.init;
            _this.Particle_init = Particle.prototype.init;
            _this.update = _this.update;
            _this.Particle_update = Particle.prototype.update;
            _this.Sprite_destroy = _super.prototype.destroy;
            _this.Particle_destroy = Particle.prototype.destroy;
            _this.applyArt = _this.applyArt;
            _this.kill = _this.kill;
            return _this;
        }
        Particle.prototype.init = function () {
            this.age = 0;
            this.velocity.x = this.speedList.current.value * this.speedMultiplier;
            this.velocity.y = 0;
            exports.ParticleUtils.rotatePoint(this.rotation, this.velocity);
            if (this.noRotation) {
                this.rotation = 0;
            } else {
                this.rotation *= exports.ParticleUtils.DEG_TO_RADS;
            }
            this.rotationSpeed *= exports.ParticleUtils.DEG_TO_RADS;
            this.rotationAcceleration *= exports.ParticleUtils.DEG_TO_RADS;
            this.alpha = this.alphaList.current.value;
            this.scale.x = this.scale.y = this.scaleList.current.value;
            this._doAlpha = !!this.alphaList.current.next;
            this._doSpeed = !!this.speedList.current.next;
            this._doScale = !!this.scaleList.current.next;
            this._doColor = !!this.colorList.current.next;
            this._doAcceleration = this.acceleration.x !== 0 || this.acceleration.y !== 0;
            this._doNormalMovement = this._doSpeed || this.speedList.current.value !== 0 || this._doAcceleration;
            this._oneOverLife = 1 / this.maxLife;
            var color = this.colorList.current.value;
            this.tint = exports.ParticleUtils.combineRGBComponents(color.r, color.g, color.b);
            this.visible = true;
        };
        Particle.prototype.applyArt = function (art) {
            this.texture = art || pixi.Texture.EMPTY;
        };
        Particle.prototype.update = function (delta) {
            this.age += delta;
            if (this.age >= this.maxLife || this.age < 0) {
                this.kill();
                return -1;
            }
            var lerp = this.age * this._oneOverLife;
            if (this.ease) {
                if (this.ease.length == 4) {
                    lerp = this.ease(lerp, 0, 1, 1);
                } else {
                    lerp = this.ease(lerp);
                }
            }
            if (this._doAlpha) this.alpha = this.alphaList.interpolate(lerp);
            if (this._doScale) {
                var scale = this.scaleList.interpolate(lerp) * this.scaleMultiplier;
                this.scale.x = this.scale.y = scale;
            }
            if (this._doNormalMovement) {
                var deltaX = void 0;
                var deltaY = void 0;
                if (this._doSpeed) {
                    var speed = this.speedList.interpolate(lerp) * this.speedMultiplier;
                    exports.ParticleUtils.normalize(this.velocity);
                    exports.ParticleUtils.scaleBy(this.velocity, speed);
                    deltaX = this.velocity.x * delta;
                    deltaY = this.velocity.y * delta;
                } else if (this._doAcceleration) {
                    var oldVX = this.velocity.x;
                    var oldVY = this.velocity.y;
                    this.velocity.x += this.acceleration.x * delta;
                    this.velocity.y += this.acceleration.y * delta;
                    if (this.maxSpeed) {
                        var currentSpeed = exports.ParticleUtils.length(this.velocity);
                        if (currentSpeed > this.maxSpeed) {
                            exports.ParticleUtils.scaleBy(this.velocity, this.maxSpeed / currentSpeed);
                        }
                    }
                    deltaX = ((oldVX + this.velocity.x) / 2) * delta;
                    deltaY = ((oldVY + this.velocity.y) / 2) * delta;
                } else {
                    deltaX = this.velocity.x * delta;
                    deltaY = this.velocity.y * delta;
                }
                this.position.x += deltaX;
                this.position.y += deltaY;
            }
            if (this._doColor) {
                this.tint = this.colorList.interpolate(lerp);
            }
            if (this.rotationAcceleration !== 0) {
                var newRotationSpeed = this.rotationSpeed + this.rotationAcceleration * delta;
                this.rotation += ((this.rotationSpeed + newRotationSpeed) / 2) * delta;
                this.rotationSpeed = newRotationSpeed;
            } else if (this.rotationSpeed !== 0) {
                this.rotation += this.rotationSpeed * delta;
            } else if (this.acceleration && !this.noRotation) {
                this.rotation = Math.atan2(this.velocity.y, this.velocity.x);
            }
            return lerp;
        };
        Particle.prototype.kill = function () {
            this.emitter.recycle(this);
        };
        Particle.prototype.destroy = function () {
            if (this.parent) this.parent.removeChild(this);
            this.Sprite_destroy();
            this.emitter = this.velocity = this.colorList = this.scaleList = this.alphaList = this.speedList = this.ease = this.next = this.prev = null;
        };
        Particle.parseArt = function (art) {
            var i;
            for (i = art.length; i >= 0; --i) {
                if (typeof art[i] == "string") art[i] = GetTextureFromString(art[i]);
            }
            if (exports.ParticleUtils.verbose) {
                for (i = art.length - 1; i > 0; --i) {
                    if (art[i].baseTexture != art[i - 1].baseTexture) {
                        if (window.console) console.warn("PixiParticles: using particle textures from different images may hinder performance in WebGL");
                        break;
                    }
                }
            }
            return art;
        };
        Particle.parseData = function (extraData) {
            return extraData;
        };
        return Particle;
    })(pixi.Sprite);
    var PolygonalChain = (function () {
        function PolygonalChain(data) {
            this.segments = [];
            this.countingLengths = [];
            this.totalLength = 0;
            this.init(data);
        }
        PolygonalChain.prototype.init = function (data) {
            if (!data || !data.length) {
                this.segments.push({ p1: { x: 0, y: 0 }, p2: { x: 0, y: 0 }, l: 0 });
            } else {
                if (Array.isArray(data[0])) {
                    for (var i = 0; i < data.length; ++i) {
                        var chain = data[i];
                        var prevPoint = chain[0];
                        for (var j = 1; j < chain.length; ++j) {
                            var second = chain[j];
                            this.segments.push({ p1: prevPoint, p2: second, l: 0 });
                            prevPoint = second;
                        }
                    }
                } else {
                    var prevPoint = data[0];
                    for (var i = 1; i < data.length; ++i) {
                        var second = data[i];
                        this.segments.push({ p1: prevPoint, p2: second, l: 0 });
                        prevPoint = second;
                    }
                }
            }
            for (var i = 0; i < this.segments.length; ++i) {
                var _a = this.segments[i],
                    p1 = _a.p1,
                    p2 = _a.p2;
                var segLength = Math.sqrt((p2.x - p1.x) * (p2.x - p1.x) + (p2.y - p1.y) * (p2.y - p1.y));
                this.segments[i].l = segLength;
                this.totalLength += segLength;
                this.countingLengths.push(this.totalLength);
            }
        };
        PolygonalChain.prototype.getRandomPoint = function (out) {
            var rand = Math.random() * this.totalLength;
            var chosenSeg;
            var lerp;
            if (this.segments.length === 1) {
                chosenSeg = this.segments[0];
                lerp = rand;
            } else {
                for (var i = 0; i < this.countingLengths.length; ++i) {
                    if (rand < this.countingLengths[i]) {
                        chosenSeg = this.segments[i];
                        lerp = i === 0 ? rand : rand - this.countingLengths[i - 1];
                        break;
                    }
                }
            }
            lerp /= chosenSeg.l || 1;
            var p1 = chosenSeg.p1,
                p2 = chosenSeg.p2;
            out.x = p1.x + lerp * (p2.x - p1.x);
            out.y = p1.y + lerp * (p2.y - p1.y);
        };
        return PolygonalChain;
    })();
    var ticker;
    var pixiNS$1 = pixi;
    if (parseInt(/^(\d+)\./.exec(pixi.VERSION)[1]) < 5) {
        ticker = pixiNS$1.ticker.shared;
    } else {
        ticker = pixiNS$1.Ticker.shared;
    }
    var helperPoint = new pixi.Point();
    var Emitter = (function () {
        function Emitter(particleParent, particleImages, config) {
            this._currentImageIndex = -1;
            this._particleConstructor = Particle;
            this.particleImages = null;
            this.startAlpha = null;
            this.startSpeed = null;
            this.minimumSpeedMultiplier = 1;
            this.acceleration = null;
            this.maxSpeed = NaN;
            this.startScale = null;
            this.minimumScaleMultiplier = 1;
            this.startColor = null;
            this.minLifetime = 0;
            this.maxLifetime = 0;
            this.minStartRotation = 0;
            this.maxStartRotation = 0;
            this.noRotation = false;
            this.minRotationSpeed = 0;
            this.maxRotationSpeed = 0;
            this.particleBlendMode = 0;
            this.customEase = null;
            this.extraData = null;
            this._frequency = 1;
            this.spawnChance = 1;
            this.maxParticles = 1e3;
            this.emitterLifetime = -1;
            this.spawnPos = null;
            this.spawnType = null;
            this._spawnFunc = null;
            this.spawnRect = null;
            this.spawnCircle = null;
            this.spawnPolygonalChain = null;
            this.particlesPerWave = 1;
            this.particleSpacing = 0;
            this.angleStart = 0;
            this.rotation = 0;
            this.ownerPos = null;
            this._prevEmitterPos = null;
            this._prevPosIsValid = false;
            this._posChanged = false;
            this._parent = null;
            this.addAtBack = false;
            this.particleCount = 0;
            this._emit = false;
            this._spawnTimer = 0;
            this._emitterLife = -1;
            this._activeParticlesFirst = null;
            this._activeParticlesLast = null;
            this._poolFirst = null;
            this._origConfig = null;
            this._origArt = null;
            this._autoUpdate = false;
            this._currentImageIndex = -1;
            this._destroyWhenComplete = false;
            this._completeCallback = null;
            this.parent = particleParent;
            if (particleImages && config) this.init(particleImages, config);
            this.recycle = this.recycle;
            this.update = this.update;
            this.rotate = this.rotate;
            this.updateSpawnPos = this.updateSpawnPos;
            this.updateOwnerPos = this.updateOwnerPos;
        }
        Object.defineProperty(Emitter.prototype, "orderedArt", {
            get: function () {
                return this._currentImageIndex !== -1;
            },
            set: function (value) {
                this._currentImageIndex = value ? 0 : -1;
            },
            enumerable: true,
            configurable: true,
        });
        Object.defineProperty(Emitter.prototype, "frequency", {
            get: function () {
                return this._frequency;
            },
            set: function (value) {
                if (typeof value == "number" && value > 0) this._frequency = value;
                else this._frequency = 1;
            },
            enumerable: true,
            configurable: true,
        });
        Object.defineProperty(Emitter.prototype, "particleConstructor", {
            get: function () {
                return this._particleConstructor;
            },
            set: function (value) {
                if (value != this._particleConstructor) {
                    this._particleConstructor = value;
                    this.cleanup();
                    for (var particle = this._poolFirst; particle; particle = particle.next) {
                        particle.destroy();
                    }
                    this._poolFirst = null;
                    if (this._origConfig && this._origArt) this.init(this._origArt, this._origConfig);
                }
            },
            enumerable: true,
            configurable: true,
        });
        Object.defineProperty(Emitter.prototype, "parent", {
            get: function () {
                return this._parent;
            },
            set: function (value) {
                this.cleanup();
                this._parent = value;
            },
            enumerable: true,
            configurable: true,
        });
        Emitter.prototype.init = function (art, config) {
            if (!art || !config) return;
            this.cleanup();
            this._origConfig = config;
            this._origArt = art;
            art = Array.isArray(art) ? art.slice() : [art];
            var partClass = this._particleConstructor;
            this.particleImages = partClass.parseArt ? partClass.parseArt(art) : art;
            if (config.alpha) {
                this.startAlpha = PropertyNode.createList(config.alpha);
            } else this.startAlpha = new PropertyNode(1, 0);
            if (config.speed) {
                this.startSpeed = PropertyNode.createList(config.speed);
                this.minimumSpeedMultiplier = ("minimumSpeedMultiplier" in config ? config.minimumSpeedMultiplier : config.speed.minimumSpeedMultiplier) || 1;
            } else {
                this.minimumSpeedMultiplier = 1;
                this.startSpeed = new PropertyNode(0, 0);
            }
            var acceleration = config.acceleration;
            if (acceleration && (acceleration.x || acceleration.y)) {
                this.startSpeed.next = null;
                this.acceleration = new pixi.Point(acceleration.x, acceleration.y);
                this.maxSpeed = config.maxSpeed || NaN;
            } else this.acceleration = new pixi.Point();
            if (config.scale) {
                this.startScale = PropertyNode.createList(config.scale);
                this.minimumScaleMultiplier = ("minimumScaleMultiplier" in config ? config.minimumScaleMultiplier : config.scale.minimumScaleMultiplier) || 1;
            } else {
                this.startScale = new PropertyNode(1, 0);
                this.minimumScaleMultiplier = 1;
            }
            if (config.color) {
                this.startColor = PropertyNode.createList(config.color);
            } else {
                this.startColor = new PropertyNode({ r: 255, g: 255, b: 255 }, 0);
            }
            if (config.startRotation) {
                this.minStartRotation = config.startRotation.min;
                this.maxStartRotation = config.startRotation.max;
            } else this.minStartRotation = this.maxStartRotation = 0;
            if (config.noRotation && (this.minStartRotation || this.maxStartRotation)) {
                this.noRotation = !!config.noRotation;
            } else this.noRotation = false;
            if (config.rotationSpeed) {
                this.minRotationSpeed = config.rotationSpeed.min;
                this.maxRotationSpeed = config.rotationSpeed.max;
            } else this.minRotationSpeed = this.maxRotationSpeed = 0;
            this.rotationAcceleration = config.rotationAcceleration || 0;
            this.minLifetime = config.lifetime.min;
            this.maxLifetime = config.lifetime.max;
            this.particleBlendMode = exports.ParticleUtils.getBlendMode(config.blendMode);
            if (config.ease) {
                this.customEase = typeof config.ease == "function" ? config.ease : exports.ParticleUtils.generateEase(config.ease);
            } else this.customEase = null;
            if (partClass.parseData) this.extraData = partClass.parseData(config.extraData);
            else this.extraData = config.extraData || null;
            this.spawnRect = this.spawnCircle = null;
            this.particlesPerWave = 1;
            if (config.particlesPerWave && config.particlesPerWave > 1) this.particlesPerWave = config.particlesPerWave;
            this.particleSpacing = 0;
            this.angleStart = 0;
            this.parseSpawnType(config);
            this.frequency = config.frequency;
            this.spawnChance = typeof config.spawnChance === "number" && config.spawnChance > 0 ? config.spawnChance : 1;
            this.emitterLifetime = config.emitterLifetime || -1;
            this.maxParticles = config.maxParticles > 0 ? config.maxParticles : 1e3;
            this.addAtBack = !!config.addAtBack;
            this.rotation = 0;
            this.ownerPos = new pixi.Point();
            this.spawnPos = new pixi.Point(config.pos.x, config.pos.y);
            this.initAdditional(art, config);
            this._prevEmitterPos = this.spawnPos.clone();
            this._prevPosIsValid = false;
            this._spawnTimer = 0;
            this.emit = config.emit === undefined ? true : !!config.emit;
            this.autoUpdate = !!config.autoUpdate;
            this.orderedArt = !!config.orderedArt;
        };
        Emitter.prototype.initAdditional = function (art, config) {};
        Emitter.prototype.parseSpawnType = function (config) {
            var spawnCircle;
            switch (config.spawnType) {
                case "rect":
                    this.spawnType = "rect";
                    this._spawnFunc = this._spawnRect;
                    var spawnRect = config.spawnRect;
                    this.spawnRect = new pixi.Rectangle(spawnRect.x, spawnRect.y, spawnRect.w, spawnRect.h);
                    break;
                case "circle":
                    this.spawnType = "circle";
                    this._spawnFunc = this._spawnCircle;
                    spawnCircle = config.spawnCircle;
                    this.spawnCircle = new pixi.Circle(spawnCircle.x, spawnCircle.y, spawnCircle.r);
                    break;
                case "ring":
                    this.spawnType = "ring";
                    this._spawnFunc = this._spawnRing;
                    spawnCircle = config.spawnCircle;
                    this.spawnCircle = new pixi.Circle(spawnCircle.x, spawnCircle.y, spawnCircle.r);
                    this.spawnCircle.minRadius = spawnCircle.minR;
                    break;
                case "burst":
                    this.spawnType = "burst";
                    this._spawnFunc = this._spawnBurst;
                    this.particleSpacing = config.particleSpacing;
                    this.angleStart = config.angleStart ? config.angleStart : 0;
                    break;
                case "point":
                    this.spawnType = "point";
                    this._spawnFunc = this._spawnPoint;
                    break;
                case "polygonalChain":
                    this.spawnType = "polygonalChain";
                    this._spawnFunc = this._spawnPolygonalChain;
                    this.spawnPolygonalChain = new PolygonalChain(config.spawnPolygon);
                    break;
                default:
                    this.spawnType = "point";
                    this._spawnFunc = this._spawnPoint;
                    break;
            }
        };
        Emitter.prototype.recycle = function (particle) {
            if (particle.next) particle.next.prev = particle.prev;
            if (particle.prev) particle.prev.next = particle.next;
            if (particle == this._activeParticlesLast) this._activeParticlesLast = particle.prev;
            if (particle == this._activeParticlesFirst) this._activeParticlesFirst = particle.next;
            particle.prev = null;
            particle.next = this._poolFirst;
            this._poolFirst = particle;
            if (particle.parent) particle.parent.removeChild(particle);
            --this.particleCount;
        };
        Emitter.prototype.rotate = function (newRot) {
            if (this.rotation == newRot) return;
            var diff = newRot - this.rotation;
            this.rotation = newRot;
            exports.ParticleUtils.rotatePoint(diff, this.spawnPos);
            this._posChanged = true;
        };
        Emitter.prototype.updateSpawnPos = function (x, y) {
            this._posChanged = true;
            this.spawnPos.x = x;
            this.spawnPos.y = y;
        };
        Emitter.prototype.updateOwnerPos = function (x, y) {
            this._posChanged = true;
            this.ownerPos.x = x;
            this.ownerPos.y = y;
        };
        Emitter.prototype.resetPositionTracking = function () {
            this._prevPosIsValid = false;
        };
        Object.defineProperty(Emitter.prototype, "emit", {
            get: function () {
                return this._emit;
            },
            set: function (value) {
                this._emit = !!value;
                this._emitterLife = this.emitterLifetime;
            },
            enumerable: true,
            configurable: true,
        });
        Object.defineProperty(Emitter.prototype, "autoUpdate", {
            get: function () {
                return this._autoUpdate;
            },
            set: function (value) {
                if (this._autoUpdate && !value) {
                    ticker.remove(this.update, this);
                } else if (!this._autoUpdate && value) {
                    ticker.add(this.update, this);
                }
                this._autoUpdate = !!value;
            },
            enumerable: true,
            configurable: true,
        });
        Emitter.prototype.playOnceAndDestroy = function (callback) {
            this.autoUpdate = true;
            this.emit = true;
            this._destroyWhenComplete = true;
            this._completeCallback = callback;
        };
        Emitter.prototype.playOnce = function (callback) {
            this.emit = true;
            this._completeCallback = callback;
        };
        Emitter.prototype.update = function (delta) {
            if (this._autoUpdate) {
                delta = delta / pixi.settings.TARGET_FPMS / 1e3;
            }
            if (!this._parent) return;
            var i, particle, next;
            for (particle = this._activeParticlesFirst; particle; particle = next) {
                next = particle.next;
                particle.update(delta);
            }
            var prevX, prevY;
            if (this._prevPosIsValid) {
                prevX = this._prevEmitterPos.x;
                prevY = this._prevEmitterPos.y;
            }
            var curX = this.ownerPos.x + this.spawnPos.x;
            var curY = this.ownerPos.y + this.spawnPos.y;
            if (this._emit) {
                this._spawnTimer -= delta < 0 ? 0 : delta;
                while (this._spawnTimer <= 0) {
                    if (this._emitterLife > 0) {
                        this._emitterLife -= this._frequency;
                        if (this._emitterLife <= 0) {
                            this._spawnTimer = 0;
                            this._emitterLife = 0;
                            this.emit = false;
                            break;
                        }
                    }
                    if (this.particleCount >= this.maxParticles) {
                        this._spawnTimer += this._frequency;
                        continue;
                    }
                    var lifetime = void 0;
                    if (this.minLifetime == this.maxLifetime) lifetime = this.minLifetime;
                    else lifetime = Math.random() * (this.maxLifetime - this.minLifetime) + this.minLifetime;
                    if (-this._spawnTimer < lifetime) {
                        var emitPosX = void 0,
                            emitPosY = void 0;
                        if (this._prevPosIsValid && this._posChanged) {
                            var lerp = 1 + this._spawnTimer / delta;
                            emitPosX = (curX - prevX) * lerp + prevX;
                            emitPosY = (curY - prevY) * lerp + prevY;
                        } else {
                            emitPosX = curX;
                            emitPosY = curY;
                        }
                        i = 0;
                        for (var len = Math.min(this.particlesPerWave, this.maxParticles - this.particleCount); i < len; ++i) {
                            if (this.spawnChance < 1 && Math.random() >= this.spawnChance) continue;
                            var p = void 0;
                            if (this._poolFirst) {
                                p = this._poolFirst;
                                this._poolFirst = this._poolFirst.next;
                                p.next = null;
                            } else {
                                p = new this.particleConstructor(this);
                            }
                            if (this.particleImages.length > 1) {
                                if (this._currentImageIndex !== -1) {
                                    p.applyArt(this.particleImages[this._currentImageIndex++]);
                                    if (this._currentImageIndex < 0 || this._currentImageIndex >= this.particleImages.length) {
                                        this._currentImageIndex = 0;
                                    }
                                } else {
                                    p.applyArt(this.particleImages[Math.floor(Math.random() * this.particleImages.length)]);
                                }
                            } else {
                                p.applyArt(this.particleImages[0]);
                            }
                            p.alphaList.reset(this.startAlpha);
                            if (this.minimumSpeedMultiplier != 1) {
                                p.speedMultiplier = Math.random() * (1 - this.minimumSpeedMultiplier) + this.minimumSpeedMultiplier;
                            }
                            p.speedList.reset(this.startSpeed);
                            p.acceleration.x = this.acceleration.x;
                            p.acceleration.y = this.acceleration.y;
                            p.maxSpeed = this.maxSpeed;
                            if (this.minimumScaleMultiplier != 1) {
                                p.scaleMultiplier = Math.random() * (1 - this.minimumScaleMultiplier) + this.minimumScaleMultiplier;
                            }
                            p.scaleList.reset(this.startScale);
                            p.colorList.reset(this.startColor);
                            if (this.minRotationSpeed == this.maxRotationSpeed) p.rotationSpeed = this.minRotationSpeed;
                            else p.rotationSpeed = Math.random() * (this.maxRotationSpeed - this.minRotationSpeed) + this.minRotationSpeed;
                            p.rotationAcceleration = this.rotationAcceleration;
                            p.noRotation = this.noRotation;
                            p.maxLife = lifetime;
                            p.blendMode = this.particleBlendMode;
                            p.ease = this.customEase;
                            p.extraData = this.extraData;
                            this.applyAdditionalProperties(p);
                            this._spawnFunc(p, emitPosX, emitPosY, i);
                            p.init();
                            p.update(-this._spawnTimer);
                            if (!p.parent) {
                                if (this.addAtBack) this._parent.addChildAt(p, 0);
                                else this._parent.addChild(p);
                            } else {
                                var children = this._parent.children;
                                if (children[0] == p) children.shift();
                                else if (children[children.length - 1] == p) children.pop();
                                else {
                                    var index = children.indexOf(p);
                                    children.splice(index, 1);
                                }
                                if (this.addAtBack) children.unshift(p);
                                else children.push(p);
                            }
                            if (this._activeParticlesLast) {
                                this._activeParticlesLast.next = p;
                                p.prev = this._activeParticlesLast;
                                this._activeParticlesLast = p;
                            } else {
                                this._activeParticlesLast = this._activeParticlesFirst = p;
                            }
                            ++this.particleCount;
                        }
                    }
                    this._spawnTimer += this._frequency;
                }
            }
            if (this._posChanged) {
                this._prevEmitterPos.x = curX;
                this._prevEmitterPos.y = curY;
                this._prevPosIsValid = true;
                this._posChanged = false;
            }
            if (!this._emit && !this._activeParticlesFirst) {
                if (this._completeCallback) {
                    var cb = this._completeCallback;
                    this._completeCallback = null;
                    cb();
                }
                if (this._destroyWhenComplete) {
                    this.destroy();
                }
            }
        };
        Emitter.prototype.applyAdditionalProperties = function (p) {};
        Emitter.prototype._spawnPoint = function (p, emitPosX, emitPosY) {
            if (this.minStartRotation == this.maxStartRotation) p.rotation = this.minStartRotation + this.rotation;
            else p.rotation = Math.random() * (this.maxStartRotation - this.minStartRotation) + this.minStartRotation + this.rotation;
            p.position.x = emitPosX;
            p.position.y = emitPosY;
        };
        Emitter.prototype._spawnRect = function (p, emitPosX, emitPosY) {
            if (this.minStartRotation == this.maxStartRotation) p.rotation = this.minStartRotation + this.rotation;
            else p.rotation = Math.random() * (this.maxStartRotation - this.minStartRotation) + this.minStartRotation + this.rotation;
            helperPoint.x = Math.random() * this.spawnRect.width + this.spawnRect.x;
            helperPoint.y = Math.random() * this.spawnRect.height + this.spawnRect.y;
            if (this.rotation !== 0) exports.ParticleUtils.rotatePoint(this.rotation, helperPoint);
            p.position.x = emitPosX + helperPoint.x;
            p.position.y = emitPosY + helperPoint.y;
        };
        Emitter.prototype._spawnCircle = function (p, emitPosX, emitPosY) {
            if (this.minStartRotation == this.maxStartRotation) p.rotation = this.minStartRotation + this.rotation;
            else p.rotation = Math.random() * (this.maxStartRotation - this.minStartRotation) + this.minStartRotation + this.rotation;
            helperPoint.x = Math.random() * this.spawnCircle.radius;
            helperPoint.y = 0;
            exports.ParticleUtils.rotatePoint(Math.random() * 360, helperPoint);
            helperPoint.x += this.spawnCircle.x;
            helperPoint.y += this.spawnCircle.y;
            if (this.rotation !== 0) exports.ParticleUtils.rotatePoint(this.rotation, helperPoint);
            p.position.x = emitPosX + helperPoint.x;
            p.position.y = emitPosY + helperPoint.y;
        };
        Emitter.prototype._spawnRing = function (p, emitPosX, emitPosY) {
            var spawnCircle = this.spawnCircle;
            if (this.minStartRotation == this.maxStartRotation) p.rotation = this.minStartRotation + this.rotation;
            else p.rotation = Math.random() * (this.maxStartRotation - this.minStartRotation) + this.minStartRotation + this.rotation;
            if (spawnCircle.minRadius !== spawnCircle.radius) {
                helperPoint.x = Math.random() * (spawnCircle.radius - spawnCircle.minRadius) + spawnCircle.minRadius;
            } else helperPoint.x = spawnCircle.radius;
            helperPoint.y = 0;
            var angle = Math.random() * 360;
            p.rotation += angle;
            exports.ParticleUtils.rotatePoint(angle, helperPoint);
            helperPoint.x += this.spawnCircle.x;
            helperPoint.y += this.spawnCircle.y;
            if (this.rotation !== 0) exports.ParticleUtils.rotatePoint(this.rotation, helperPoint);
            p.position.x = emitPosX + helperPoint.x;
            p.position.y = emitPosY + helperPoint.y;
        };
        Emitter.prototype._spawnPolygonalChain = function (p, emitPosX, emitPosY) {
            if (this.minStartRotation == this.maxStartRotation) p.rotation = this.minStartRotation + this.rotation;
            else p.rotation = Math.random() * (this.maxStartRotation - this.minStartRotation) + this.minStartRotation + this.rotation;
            this.spawnPolygonalChain.getRandomPoint(helperPoint);
            if (this.rotation !== 0) exports.ParticleUtils.rotatePoint(this.rotation, helperPoint);
            p.position.x = emitPosX + helperPoint.x;
            p.position.y = emitPosY + helperPoint.y;
        };
        Emitter.prototype._spawnBurst = function (p, emitPosX, emitPosY, i) {
            if (this.particleSpacing === 0) p.rotation = Math.random() * 360;
            else p.rotation = this.angleStart + this.particleSpacing * i + this.rotation;
            p.position.x = emitPosX;
            p.position.y = emitPosY;
        };
        Emitter.prototype.cleanup = function () {
            var particle, next;
            for (particle = this._activeParticlesFirst; particle; particle = next) {
                next = particle.next;
                this.recycle(particle);
                if (particle.parent) particle.parent.removeChild(particle);
            }
            this._activeParticlesFirst = this._activeParticlesLast = null;
            this.particleCount = 0;
        };
        Emitter.prototype.destroy = function () {
            this.autoUpdate = false;
            this.cleanup();
            var next;
            for (var particle = this._poolFirst; particle; particle = next) {
                next = particle.next;
                particle.destroy();
            }
            this._poolFirst = this._parent = this.particleImages = this.spawnPos = this.ownerPos = this.startColor = this.startScale = this.startAlpha = this.startSpeed = this.customEase = this._completeCallback = null;
        };
        return Emitter;
    })();
    var helperPoint$1 = new pixi.Point();
    var MATH_FUNCS = ["pow", "sqrt", "abs", "floor", "round", "ceil", "E", "PI", "sin", "cos", "tan", "asin", "acos", "atan", "atan2", "log"];
    var WHITELISTER = new RegExp(["[01234567890\\.\\*\\-\\+\\/\\(\\)x ,]"].concat(MATH_FUNCS).join("|"), "g");
    var parsePath = function (pathString) {
        var matches = pathString.match(WHITELISTER);
        for (var i = matches.length - 1; i >= 0; --i) {
            if (MATH_FUNCS.indexOf(matches[i]) >= 0) matches[i] = "Math." + matches[i];
        }
        pathString = matches.join("");
        return new Function("x", "return " + pathString + ";");
    };
    var PathParticle = (function (_super) {
        __extends(PathParticle, _super);
        function PathParticle(emitter) {
            var _this = _super.call(this, emitter) || this;
            _this.path = null;
            _this.initialRotation = 0;
            _this.initialPosition = new pixi.Point();
            _this.movement = 0;
            return _this;
        }
        PathParticle.prototype.init = function () {
            this.initialRotation = this.rotation;
            this.Particle_init();
            this.path = this.extraData.path;
            this._doNormalMovement = !this.path;
            this.movement = 0;
            this.initialPosition.x = this.position.x;
            this.initialPosition.y = this.position.y;
        };
        PathParticle.prototype.update = function (delta) {
            var lerp = this.Particle_update(delta);
            if (lerp >= 0 && this.path) {
                var speed = this.speedList.interpolate(lerp) * this.speedMultiplier;
                this.movement += speed * delta;
                helperPoint$1.x = this.movement;
                helperPoint$1.y = this.path(this.movement);
                exports.ParticleUtils.rotatePoint(this.initialRotation, helperPoint$1);
                this.position.x = this.initialPosition.x + helperPoint$1.x;
                this.position.y = this.initialPosition.y + helperPoint$1.y;
            }
            return lerp;
        };
        PathParticle.prototype.destroy = function () {
            this.Particle_destroy();
            this.path = this.initialPosition = null;
        };
        PathParticle.parseArt = function (art) {
            return Particle.parseArt(art);
        };
        PathParticle.parseData = function (extraData) {
            var output = {};
            if (extraData && extraData.path) {
                try {
                    output.path = parsePath(extraData.path);
                } catch (e) {
                    if (exports.ParticleUtils.verbose) console.error("PathParticle: error in parsing path expression");
                    output.path = null;
                }
            } else {
                if (exports.ParticleUtils.verbose) console.error("PathParticle requires a path string in extraData!");
                output.path = null;
            }
            return output;
        };
        return PathParticle;
    })(Particle);
    var AnimatedParticle = (function (_super) {
        __extends(AnimatedParticle, _super);
        function AnimatedParticle(emitter) {
            var _this = _super.call(this, emitter) || this;
            _this.textures = null;
            _this.duration = 0;
            _this.framerate = 0;
            _this.elapsed = 0;
            _this.loop = false;
            return _this;
        }
        AnimatedParticle.prototype.init = function () {
            this.Particle_init();
            this.elapsed = 0;
            if (this.framerate < 0) {
                this.duration = this.maxLife;
                this.framerate = this.textures.length / this.duration;
            }
        };
        AnimatedParticle.prototype.applyArt = function (art) {
            this.textures = art.textures;
            this.framerate = art.framerate;
            this.duration = art.duration;
            this.loop = art.loop;
        };
        AnimatedParticle.prototype.update = function (delta) {
            var lerp = this.Particle_update(delta);
            if (lerp >= 0) {
                this.elapsed += delta;
                if (this.elapsed > this.duration) {
                    if (this.loop) this.elapsed = this.elapsed % this.duration;
                    else this.elapsed = this.duration - 1e-6;
                }
                var frame = (this.elapsed * this.framerate + 1e-7) | 0;
                this.texture = this.textures[frame] || pixi.Texture.EMPTY;
            }
            return lerp;
        };
        AnimatedParticle.prototype.destroy = function () {
            this.Particle_destroy();
            this.textures = null;
        };
        AnimatedParticle.parseArt = function (art) {
            var data, output, textures, tex, outTextures;
            var outArr = [];
            for (var i = 0; i < art.length; ++i) {
                data = art[i];
                outArr[i] = output = {};
                output.textures = outTextures = [];
                textures = data.textures;
                for (var j = 0; j < textures.length; ++j) {
                    tex = textures[j];
                    if (typeof tex == "string") outTextures.push(GetTextureFromString(tex));
                    else if (tex instanceof pixi.Texture) outTextures.push(tex);
                    else {
                        var dupe = tex.count || 1;
                        if (typeof tex.texture == "string") tex = GetTextureFromString(tex.texture);
                        else tex = tex.texture;
                        for (; dupe > 0; --dupe) {
                            outTextures.push(tex);
                        }
                    }
                }
                if (data.framerate == "matchLife") {
                    output.framerate = -1;
                    output.duration = 0;
                    output.loop = false;
                } else {
                    output.loop = !!data.loop;
                    output.framerate = data.framerate > 0 ? data.framerate : 60;
                    output.duration = outTextures.length / output.framerate;
                }
            }
            return outArr;
        };
        return AnimatedParticle;
    })(Particle);
    exports.GetTextureFromString = GetTextureFromString;
    exports.Particle = Particle;
    exports.Emitter = Emitter;
    exports.PathParticle = PathParticle;
    exports.AnimatedParticle = AnimatedParticle;
    exports.PolygonalChain = PolygonalChain;
    exports.PropertyList = PropertyList;
    exports.PropertyNode = PropertyNode;
})((this.PIXI.particles = this.PIXI.particles || {}), PIXI);
