define(['components/core',
		'components/helpers/render-template',
		'components/pdp-templates/custom-select',
		'components/pdp-templates/colors',
		'components/pdp-templates/gallery-item'
], function (core, render, selectTpl, colorsTpl, galleryItem) {

	var changeFormat = core.extend({

		confiData: {
			configurationID: '',
			template_design: productJSON.sku,
			template_format: productJSON.products[0].attributes.format,
			template_color: productJSON.products[0].options.COLOR.values[0].optionKey,
			template_color_id: productJSON.products[0].options.COLOR.values[0].id,
			template_diecut: '',
			template_diecut_id: '',
			template_paper_id: productJSON.products[0].options.PAPER.values[0].id,
			tag_sku: '',
			quantity: 10,
			lacquer_sku: '',
			view: 'PDP',
			locale: 'de_DE',
			mode: 'spryker',
			idAbstractProduct: productJSON.abstractId
		},

		constructor: function (options) {

			this.config = {
				selected: 'selected',
				holder: '.product-options',
				mainGallery: '.main-gallery ul',
				mainGalleryItems: '.main-gallery li',
				mainGalleryImgs: '.main-gallery img',
				thumbnailsGallery: '.gallery-thumbnails ul',
				thumbnailsGalleryImgs: '.gallery-thumbnails img',
				selectors: {
					select: '.custom-select',
					colors: '.filter-colors',
					colorItem: '.color-item'
				}
			};
			this.$ = {};
			this.$.el = jQuery(options.el);
			jQuery.extend(true, this.config, options || {});
			this.$.holder = jQuery(this.config.holder);
			this.$.mainGallery = jQuery(this.config.mainGallery);
			this.$.thumbnails = jQuery(this.config.thumbnailsGallery);
			this.init();
		},

		init: function () {

			this.attachEvents();

			this.setConfiData();

		},

		reRenderOptions: function (sku) {
			var productJson = this.getProductInfo(sku)[0],
				selects = this.getSelectsArr(productJson),
				colors = productJson.attributes.colors;

			this.$.holder.find(this.config.selectors.select).remove();
			this.$.holder.append(render(selectTpl, selects));
			this.$.holder.find(this.config.selectors.colors).empty().html(render(colorsTpl, {colors: colors}));
		},

		changeGallery: function (format) {
			var firstItem = jQuery(this.config.mainGalleryItems).eq(0).detach(),
				prodInfo = this.getProductInfo(format)[0],
				galleryItems = render(galleryItem, {crossProducts: prodInfo.crossselling_products, color: prodInfo.attributes.colors[0].substr(1)});
			this.getNewUrl(firstItem.find('img'), {format: prodInfo.attributes.format.substr(1), color: prodInfo.attributes.colors[0].substr(1)});

			this.$.mainGallery.html(firstItem).append(galleryItems);
			this.$.thumbnails.empty().html(firstItem.clone()).append(galleryItems);
			this.$.thumbnails.find('img').attr('width', 100);
		},

		changeImgUrl: function (params) {
			var imgs = jQuery(this.config.mainGalleryImgs).add(this.config.thumbnailsGalleryImgs);

			imgs.each(jQuery.proxy(function(ind, img){
				img = jQuery(img);
				this.getNewUrl(img, params);
			}, this));

		},

		getNewUrl: function (img, params) {
			var srcArr = img.attr('src').split('-'),
				format = params.format ? params.format : srcArr[srcArr.length-1].substr(0, 3),
				color = params.color ? params.color : srcArr[srcArr.length-1].substr(3, 2),
				rest = srcArr[srcArr.length-1].substr(5);

			srcArr[srcArr.length-1] = format + color + rest;

			img.attr('src', srcArr.join('-'));
		},

		getProductInfo: function (sku) {
			return jQuery.grep(productJSON.products, function (item) {
				return item.sku === sku;
			});
		},

		getSelectsArr: function (json) {
			var selects = [];

			selects.push(this.getPaperData(json.attributes.papers));
			selects.push(this.getQuantity(json.attributes.prices));

			if(json.attributes.lacquers[0] !== ''){
				selects.push(this.getLacquers(json.attributes.lacquers));
			}
			if(json.attributes.diecut[0] !== ''){
				selects.push(this.getDiecut(json.attributes.diecut));
			}

			return {selects: selects};
		},

		getLacquers: function (data) {
			var lacquers = {
				title: 'Veredelung:',
				selectedOpt: data[0],
				label: 'Veredelung',
				options: []
			};

			for (var i = 0; i < data.length; i++){
				lacquers.options.push(data[i]);
			}

			return lacquers;
		},

		getDiecut: function (data) {
			var diecut = {
				title: 'Stanzung:',
				selectedOpt: data[0],
				label: 'Stanzung',
				options: []
			};

			for (var i = 0; i < data.length; i++){
				diecut.options.push(data[i]);
			}

			return diecut;
		},

		getPaperData: function (data) {
			var newObj = {
				paper: true,
				title: 'Papiersorte:',
				selectedOpt: data[0].name + ' +' + data[0].price + '&euro;',
				addInfo: true,
				label: 'Papiersorte',
				options: []
			};

			for (var i = 0; i < data.length; i++){
				newObj.options.push(data[i].name + ' +' + data[i].price + '&euro;');
			}

			return newObj;

		},

		getQuantity: function (data) {
			var newObj = {
				title: 'Bestellmenge:',
				selectedOpt: data[0].amount + ' Stück (à ' + data[0].pricePerPiece + ' €)',
				label: 'Bestellmenge',
				options: []
			};

			for (var i = 0; i < data.length; i++) {
				newObj.options.push(data[i].amount + ' Stück (à ' + data[i].pricePerPiece + ' €)');
			}
			return newObj;
		},

		attachEvents: function () {
			var self = this;

			jQuery(document).on('click', self.config.selectors.colorItem, function (ev) {
				ev.preventDefault();
				var el = jQuery(this);

				el.hasClass(self.config.selected) ? el.removeClass(self.config.selected) : el.addClass(self.config.selected);
				self.$.holder.find(self.config.selectors.colorItem).not(this).removeClass(self.config.selected);

				var colorObj = _.find(productJSON.products[0].options.COLOR.values, function(color){return color.optionKey === 'C' + el.data('color')}) || {};

				self.setConfiData({template_color: colorObj.optionKey, template_color_id: colorObj.id});

				self.changeImgUrl({color: el.data('color')});
			});

			this.$.el.on('click', function (ev) {
				ev.preventDefault();
				var el = jQuery(this);
				el.hasClass(self.config.selected) ? el.removeClass(self.config.selected) : el.addClass(self.config.selected);
				self.$.el.not(this).removeClass(self.config.selected);
				self.reRenderOptions(el.data('sku'));
				self.changeGallery(el.data('sku'));
			});
		},

		setConfiData: function(obj){

			var key;

			if(obj) for(key in obj){this.confiData[key] = obj[key]}

			var hash = [];

			for(key in this.confiData){hash.push(key + '=' + this.confiData[key])}

			jQuery('a.personalize-button').attr('href', 'http://test.msk02.hamburg.kartenmacherei.de/?p=' + btoa(hash.join('&') + '&editable=true'));

		}

	});

	return changeFormat;
});
