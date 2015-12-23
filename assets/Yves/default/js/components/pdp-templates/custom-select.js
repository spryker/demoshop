define([], function () {
	var customSelect = '{{for (i=0; i < selects.length; i++) { }}\
		{{if (selects[i].paper) { }}\
			<div class="custom-select paper-select customized">\
		{{ } else { }}\
			<div class="custom-select customized">\
		{{ } }}\
		<div class="holder">\
			<span class="title">{{=selects[i].title}}</span>\
			<span class="selected-item selected-option">{{=selects[i].selectedOpt}}</span>\
			{{ if (selects[i].addInfo) { }}\
				<div class="add-info">\
					<div class="img"></div>\
					<div class="description">Roboto Regular 10pt #aaaaaa consectetur adipiscing elit. Pellen tesque quis lacus vel sapien mollis gra vida fringilla et lacus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam scelerisque nisl vel risus feugiat euismod.</div>\
				</div>\
			{{ } }}\
		</div>\
		<div class="select-options">\
			<span class="label mobile-view">{{=selects[i].label}}</span>\
			<ul>\
			{{ for (k=0; k < selects[i].options.length; k++) { }}\
				{{ if (selects[i].paper) { }}\
					<li class="option">\
						<div class="img"></div>\
						<strong>\
							<span class="option">{{=selects[i].options[k]}}</span>\
						</strong>\
					</li>\
				{{ } else { }}\
					<li class="option">{{=selects[i].options[k]}}</li>\
				{{ } }}\
			{{ } }}\
			</ul>\
		</div>\
		</div>\
	{{ } }}';
	return customSelect;
});






