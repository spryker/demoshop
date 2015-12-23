define([], function () {
	var colorsTpl = '{{for (i=0; i < colors.length; i++) { }}\
		<span>\
			{{if (i === 0) { }}\
				<a href="#" data-color="{{=colors[i].substr(1)}}" class="color-item {{=colors[i].toLowerCase()}} selected"></a>\
			{{ } else { }}\
				<a href="#" data-color="{{=colors[i].substr(1)}}" class="color-item {{=colors[i].toLowerCase()}}"></a>\
			{{ } }}\
			<span>{{=colors[i]}}</span>\
		</span>\
	{{ } }}';
	return colorsTpl;
});
