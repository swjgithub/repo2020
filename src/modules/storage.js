/**
 * [Storage description]
 * @type {Object}
 */
var Storage={
	set:function(key,value){
		return localStorage.setItem(key,JSON.stringify(value));
	},
	get:function(key){
		return JSON.parse(localStorage.getItem(key));
	},
	romove:function(key){
		localStorage.romoveItem(key);
	},

	clear:function(){
		localStorage.clear();
	}
}

export default Storage;