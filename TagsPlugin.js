var TagsPlugin = function(ul_different_tags, div_to_filter) {
	this.ul_different_tags = ul_different_tags;
	this.div_to_filter     = div_to_filter;
};

TagsPlugin.prototype.obtainDivsWithTags = function() {
	return this.div_to_filter.find('div').filter(function() { return $(this).attr('tags') !== undefined; });
};

TagsPlugin.prototype.prepareDivsWithTags = function() {
	this.obtainDivsWithTags().each(function(v) {
		this.tagsArray = $(this).attr('tags').replace(/^\s+/, '').replace(/\s+$/, '').split(/\s*,\s*/);
		$(this).find('h2:first').after('<ul class="sectionTags" />');
		var ul = $(this).find('ul.sectionTags');
		$.each(this.tagsArray, function(k, tag) {
			ul.append('<li>' + tag + '</li>');
		});
		//console.log(this.tagsArray);
	});
};

//console.log(TagsPlugin.obtainDivsWithTags());
TagsPlugin.prototype.obtainTags = function() {
	var differentTagsObject = {};
	var differentTags = [];
	this.obtainDivsWithTags().each(function(v) {
		$.each(this.tagsArray, function(n, tag) {
			if (differentTagsObject[tag] === undefined) {
				differentTagsObject[tag] = true;
				differentTags.push(tag);
			}
		});
		//console.log();
		//differentTags
		//console.log(tags);
	});
	differentTags.sort();
	return differentTags;
};
TagsPlugin.prototype.update = function() {
	//alert(1);
	var differentTagsObject = {};
	var showAll = true;
	$('ul#tags li input[type=checkbox]').each(function(n, tag_check) {
		//console.log($(tag_check).attr('tag') + ': ' + $(tag_check).attr('checked'));
		if ($(tag_check).attr('checked')) {
			differentTagsObject[$(tag_check).attr('tag')] = true;
			showAll = false;
		}
		//differentTagsObject
	});
	this.obtainDivsWithTags().each(function() {
		var visible = false;
		$.each(this.tagsArray, function(k, v) {
			if (showAll || (differentTagsObject[v] !== undefined)) {
				visible = true;
			}
		});
		//$(this).css('display', visible ? 'block' : 'none');
		if (visible) {
			//$(this).slideUp(500);
			$(this).show('fast');
		} else {
			//$(this).slideDown(500);
			$(this).hide('fast');
		}
		//console.log('visible: ' + visible);
	});
};
TagsPlugin.prototype.hook = function() {
	var tagsPlugin = this;
	this.prepareDivsWithTags();

	var tags = this.obtainTags();
	//console.log(tags);
	$.each(tags, function(k, v) {
		$('ul#tags').append(
			$('<li><label><input type="checkbox" tag="' + v + '" />' + v + '</label></li>').click(function() {
				tagsPlugin.update();
			})
		);
	});
	this.update();
};

$(window).ready(function() {
	(new TagsPlugin($('ul#tags'), $('#sidequests'))).hook();
});