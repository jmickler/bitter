'use strict';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var BleetModel = Backbone.Model.extend({
	urlRoot: '/api/bleets/',
	idAttribute: 'id',
});


var BleetsCollection = Backbone.Collection.extend({
	url: '/api/bleets/',
	model: BleetModel
});


var BleetItemView = Backbone.View.extend({
	el:'<li class="hello"></li>',

	template: _.template('<h2><%= bleet.get("title") %></h2>'),

	events: {
		'click h2': function(e) {
			this.model.destroy();
		}
	},

	initialize: function() {
		// this.listenTo(this.model, 'all', function() {
		// 	console.log(arguments);
		// });
		this.listenTo(this.model, 'sync', this.render);
	},

	render: function() {
		this.$el.html(this.template({ bleet: this.model }));
	}
});

var BleetsListView = Backbone.View.extend({
	el: '<ul></ul>',

	template: undefined,

	initialize: function() {
		this.listenTo(this.collection, 'all', function(event) {
			console.log(event);
		});
		this.listenTo(this.collection, 'sync update', this.render);
	},

	render: function() {
		var that = this;
		this.$el.html('');
		this.collection.each(function(bleetModel) {
			var bleetItemView = new BleetItemView({ model: bleetModel });
			bleetItemView.render();
			that.$el.append(bleetItemView.el);
		});
		return this;
	}
});

var bleets = new BleetsCollection();

bleets.fetch();

var bleetsListView = new BleetsListView({collection: bleets});
bleetsListView.render();

$('#content').html(bleetsListView.el);
console.log('view inserted!');