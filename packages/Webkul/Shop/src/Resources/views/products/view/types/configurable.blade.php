@if (Webkul\Product\Helpers\ProductType::hasVariants($product->type))
    {!! view_render_event('bagisto.shop.products.view.configurable-options.before', ['product' => $product]) !!}

    <v-product-configurable-options :errors="errors"></v-product-configurable-options>

    {!! view_render_event('bagisto.shop.products.view.configurable-options.after', ['product' => $product]) !!}

    @push('scripts')
        <script
            type="text/x-template"
            id="v-product-configurable-options-template"
        >
            <div class="w-full max-w-full">
                <input
                    type="hidden"
                    name="selected_configurable_option"
                    id="selected_configurable_option"
                    :value="selectedOptionVariant"
                    ref="selected_configurable_option"
                >

                <div
                    class="mt-4 first:mt-0"
                    v-for='(attribute, index) in childAttributes'
                >
                    <!-- Dropdown Options Container -->
                    <template v-if="! attribute.swatch_type || attribute.swatch_type == '' || attribute.swatch_type == 'dropdown'">
                        <h3 class="mb-2 text-xs uppercase tracking-wider font-semibold text-white">
                            @{{ attribute.label }}
                        </h3>
                        
                        <v-field
                            as="select"
                            :name="'super_attribute[' + attribute.id + ']'"
                            class="custom-select mb-2 block w-full cursor-pointer rounded-xl border border-white/20 bg-[#041a0e]/80 backdrop-blur-md px-4 py-2.5 text-sm text-white transition-colors focus:border-emerald-400 focus:ring-emerald-400"
                            :class="[errors['super_attribute[' + attribute.id + ']'] ? 'border-red-500' : '']"
                            :id="'attribute_' + attribute.id"
                            v-model="attribute.selectedValue"
                            rules="required"
                            :label="attribute.label"
                            :aria-label="attribute.label"
                            :disabled="attribute.disabled"
                            @change="configure(attribute, $event.target.value)"
                        >
                            <option
                                v-for='(option, index) in attribute.options'
                                :value="option.id"
                            >
                                @{{ option.label }}
                            </option>
                        </v-field>
                    </template>

                    <!-- Swatch Options Container -->
                    <template v-else>
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-xs uppercase tracking-wider font-semibold text-white">
                                Select @{{ attribute.label }}
                            </h3>
                            <span
                                v-if="attribute.selectedValue"
                                class="text-xs font-medium text-emerald-400"
                            >
                                Selected: @{{ attribute.options.find(o => o.id == attribute.selectedValue)?.label }}
                            </span>
                        </div>

                        <!-- Swatch Options -->
                        <div class="flex items-center gap-2 flex-wrap">
                            <template v-for="(option, index) in attribute.options">
                                <template v-if="option.id">
                                    <!-- Color Swatch Options -->
                                    <label
                                        class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none transition-all"
                                        :class="{'ring-2 ring-emerald-400 ring-offset-2 ring-offset-[#041a0e]' : option.id == attribute.selectedValue}"
                                        :title="option.label"
                                        v-if="attribute.swatch_type == 'color'"
                                    >
                                        <v-field
                                            type="radio"
                                            :name="'super_attribute[' + attribute.id + ']'"
                                            :value="option.id"
                                            v-slot="{ field }"
                                            rules="required"
                                            :label="attribute.label"
                                            :aria-label="attribute.label"
                                        >
                                            <input
                                                type="radio"
                                                :name="'super_attribute[' + attribute.id + ']'"
                                                :value="option.id"
                                                v-bind="field"
                                                :id="'attribute_' + attribute.id"
                                                :aria-labelledby="'color-choice-' + index + '-label'"
                                                class="peer sr-only"
                                                @click="configure(attribute, $event.target.value)"
                                            />
                                        </v-field>

                                        <span
                                            class="h-8 w-8 rounded-full border border-white/20 shadow-sm"
                                            tabindex="0"
                                            :style="{ 'background-color': option.swatch_value }"
                                        ></span>
                                    </label>

                                    <!-- Image Swatch Options -->
                                    <label 
                                        class="group relative flex h-[52px] w-[52px] cursor-pointer items-center justify-center overflow-hidden rounded-xl border bg-white/10 font-medium uppercase text-white transition-all backdrop-blur-sm"
                                        :class="{'border-2 border-emerald-400 ring-2 ring-emerald-400/30 shadow-md' : option.id == attribute.selectedValue, 'border-white/20 hover:border-emerald-400/60' : option.id != attribute.selectedValue }"
                                        :title="option.label"
                                        v-if="attribute.swatch_type == 'image'"
                                    >
                                        <v-field
                                            type="radio"
                                            :name="'super_attribute[' + attribute.id + ']'"
                                            v-model="attribute.selectedValue"
                                            :value="option.id"
                                            v-slot="{ field }"
                                            rules="required"
                                            :label="attribute.label"
                                            :aria-label="attribute.label"
                                        >
                                            <input
                                                type="radio"
                                                :name="'super_attribute[' + attribute.id + ']'"
                                                :value="option.id"
                                                v-bind="field"
                                                :id="'attribute_' + attribute.id"
                                                :aria-labelledby="'color-choice-' + index + '-label'"
                                                class="peer sr-only"
                                                @click="configure(attribute, $event.target.value)"
                                            />
                                        </v-field>

                                        <img
                                            :src="option.swatch_value"
                                            :title="option.label"
                                            class="w-full h-full object-cover"
                                        />
                                    </label>

                                    <!-- Text Swatch Options (Pack Sizes: 100g, 250g, 500g) -->
                                    <label 
                                        class="group relative flex h-fit min-w-fit cursor-pointer items-center justify-center rounded-xl border px-3.5 py-2 text-xs font-semibold tracking-wide transition-all duration-200 select-none backdrop-blur-sm"
                                        :class="{'border-emerald-500 bg-emerald-600 text-white shadow-md' : option.id == attribute.selectedValue, 'border-white/20 bg-white/10 text-white/90 hover:border-emerald-400 hover:bg-white/20': option.id != attribute.selectedValue }"
                                        :title="option.label"
                                        v-if="attribute.swatch_type == 'text'"
                                    >
                                        <v-field
                                            type="radio"
                                            :name="'super_attribute[' + attribute.id + ']'"
                                            :value="option.id"
                                            v-model="attribute.selectedValue"
                                            v-slot="{ field }"
                                            rules="required"
                                            :label="attribute.label"
                                            :aria-label="attribute.label"
                                        >
                                            <input
                                                type="radio"
                                                :name="'super_attribute[' + attribute.id + ']'"
                                                :value="option.id"
                                                v-bind="field"
                                                :id="'attribute_' + attribute.id"
                                                class="peer sr-only"
                                                :aria-labelledby="'color-choice-' + index + '-label'"
                                                @click="configure(attribute, $event.target.value)"
                                            />
                                        </v-field>

                                        <span class="inline-flex items-center gap-1.5">
                                            <span>@{{ option.label }}</span>
                                        </span>
                                    </label>
                                </template>
                            </template>

                            <span
                                class="text-xs text-[#6E7765]"
                                v-if="! attribute.options.length"
                            >
                                @lang('shop::app.products.view.type.configurable.select-above-options')
                            </span>
                        </div>
                    </template>

                    <v-error-message
                        :name="'super_attribute[' + attribute.id + ']'"
                        v-slot="{ message }"
                    >
                        <p class="mt-1 text-xs italic text-red-500">
                            @{{ message }}
                        </p>
                    </v-error-message>
                </div>
            </div>
        </script>

        <script type="module">
            let galleryImages = @json(product_image()->getGalleryImages($product));

            app.component('v-product-configurable-options', {
                template: '#v-product-configurable-options-template',

                props: ['errors'],

                data() {
                    return {
                        config: @json(app('Webkul\Product\Helpers\ConfigurableOption')->getConfigurationConfig($product)),

                        childAttributes: [],

                        possibleOptionVariant: null,

                        selectedOptionVariant: '',

                        galleryImages: [],
                    }
                },

                mounted() {
                    let attributes = JSON.parse(JSON.stringify(this.config)).attributes.slice();

                    let index = attributes.length;

                    while (index--) {
                        let attribute = attributes[index];

                        attribute.options = [];

                        if (index) {
                            attribute.disabled = true;
                        } else {
                            this.fillAttributeOptions(attribute);
                        }

                        attribute = Object.assign(attribute, {
                            childAttributes: this.childAttributes.slice(),
                            prevAttribute: attributes[index - 1],
                            nextAttribute: attributes[index + 1]
                        });

                        this.childAttributes.unshift(attribute);
                    }
                },

                methods: {
                    configure(attribute, optionId) {
                        this.possibleOptionVariant = this.getPossibleOptionVariant(attribute, optionId);

                        if (optionId) {
                            attribute.selectedValue = optionId;
                            
                            if (attribute.nextAttribute) {
                                attribute.nextAttribute.disabled = false;

                                this.clearAttributeSelection(attribute.nextAttribute);

                                this.fillAttributeOptions(attribute.nextAttribute);

                                this.resetChildAttributes(attribute.nextAttribute);
                            } else {
                                this.selectedOptionVariant = this.possibleOptionVariant;
                            }
                        } else {
                            this.clearAttributeSelection(attribute);

                            this.clearAttributeSelection(attribute.nextAttribute);

                            this.resetChildAttributes(attribute);
                        }

                        this.reloadPrice();
                        
                        this.reloadImages();
                    },

                    getPossibleOptionVariant(attribute, optionId) {
                        let matchedOptions = attribute.options.filter(option => option.id == optionId);

                        if (matchedOptions[0]?.allowedProducts) {
                            return matchedOptions[0].allowedProducts[0];
                        }

                        return undefined;
                    },

                    fillAttributeOptions(attribute) {
                        let options = this.config.attributes.find(tempAttribute => tempAttribute.id === attribute.id)?.options;

                        attribute.options = [{
                            'id': '',
                            'label': "@lang('shop::app.products.view.type.configurable.select-options')",
                            'products': []
                        }];

                        if (! options) {
                            return;
                        }

                        let prevAttributeSelectedOption = attribute.prevAttribute?.options.find(option => option.id == attribute.prevAttribute.selectedValue);

                        let index = 1;

                        for (let i = 0; i < options.length; i++) {
                            let allowedProducts = [];

                            if (prevAttributeSelectedOption) {
                                for (let j = 0; j < options[i].products.length; j++) {
                                    if (prevAttributeSelectedOption.allowedProducts && prevAttributeSelectedOption.allowedProducts.includes(options[i].products[j])) {
                                        allowedProducts.push(options[i].products[j]);
                                    }
                                }
                            } else {
                                allowedProducts = options[i].products.slice(0);
                            }

                            if (allowedProducts.length > 0) {
                                options[i].allowedProducts = allowedProducts;

                                attribute.options[index++] = options[i];
                            }
                        }
                    },

                    resetChildAttributes(attribute) {
                        if (! attribute.childAttributes) {
                            return;
                        }

                        attribute.childAttributes.forEach(function (set) {
                            set.selectedValue = null;

                            set.disabled = true;
                        });
                    },

                    clearAttributeSelection (attribute) {
                        if (! attribute) {
                            return;
                        }

                        attribute.selectedValue = null;

                        this.selectedOptionVariant = null;
                    },

                    reloadPrice () {
                        let selectedOptionCount = this.childAttributes.filter(attribute => attribute.selectedValue).length;

                        let finalPriceElements = document.querySelectorAll('.final-price');
                        let regularPriceElements = document.querySelectorAll('.regular-price');
                        let priceLabel = document.querySelector('.price-label');

                        let configVariant = this.config.variant_prices[this.possibleOptionVariant];

                        if (this.childAttributes.length == selectedOptionCount && configVariant) {
                            if (priceLabel) priceLabel.style.display = 'none';

                            if (parseFloat(configVariant.regular.price) > parseFloat(configVariant.final.price)) {
                                regularPriceElements.forEach(el => {
                                    el.style.display = 'block';
                                    el.innerHTML = configVariant.regular.formatted_price;
                                });

                                finalPriceElements.forEach(el => {
                                    el.innerHTML = configVariant.final.formatted_price;
                                });
                            } else {
                                finalPriceElements.forEach(el => {
                                    el.innerHTML = configVariant.regular.formatted_price;
                                });

                                regularPriceElements.forEach(el => {
                                    el.style.display = 'none';
                                    el.innerHTML = '';
                                });
                            }

                            this.$emitter.emit('configurable-variant-selected-event', this.possibleOptionVariant);
                        } else {
                            if (priceLabel) priceLabel.style.display = 'inline-block';

                            const baseRegular = parseFloat(this.config.regular?.price ?? 0);
                            const baseFinal = parseFloat(this.config.final?.price ?? baseRegular);

                            if (baseFinal < baseRegular) {
                                regularPriceElements.forEach(el => {
                                    el.style.display = 'block';
                                    el.innerHTML = this.config.regular.formatted_price;
                                });

                                finalPriceElements.forEach(el => {
                                    el.innerHTML = this.config.final.formatted_price;
                                });
                            } else {
                                regularPriceElements.forEach(el => {
                                    el.style.display = 'none';
                                    el.innerHTML = '';
                                });

                                finalPriceElements.forEach(el => {
                                    el.innerHTML = this.config.regular.formatted_price;
                                });
                            }

                            this.$emitter.emit('configurable-variant-selected-event', 0);
                        }
                    },

                    reloadImages () {
                        galleryImages.splice(0, galleryImages.length);

                        if (this.possibleOptionVariant) {
                            if (this.config.variant_images && this.config.variant_images[this.possibleOptionVariant]) {
                                this.config.variant_images[this.possibleOptionVariant].forEach(function(image) {
                                    galleryImages.push(image);
                                });
                            }

                            if (this.config.variant_videos && this.config.variant_videos[this.possibleOptionVariant]) {
                                this.config.variant_videos[this.possibleOptionVariant].forEach(function(video) {
                                    galleryImages.push(video);
                                });
                            }
                        }

                        this.galleryImages.forEach(function(image) {
                            galleryImages.push(image);
                        });

                        if (galleryImages.length && this.$parent?.$parent?.$refs?.gallery?.media) {
                            this.$parent.$parent.$refs.gallery.media.images = [...galleryImages];
                        }

                        this.$emitter.emit('configurable-variant-update-images-event', galleryImages);
                    },
                }
            });
        </script>
    @endpush
@endif
