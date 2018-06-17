// ...
window.Pusher = require('pusher-js');
import Echo from "laravel-echo";
//window.PNotify = require('pnotify')
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '7ec3189e9df6baa09d7e',
    cluster: 'ap1',
    encrypted: true
});

var notifications = [];

//...
 
$(document).ready(function() {
    if(typeof userId !=='undefined') {
        window.Echo.private(`App.Models.User.${userId}`)
            .notification((notification) => {
                showNotification(notification);
            });
    }
});


		
function showNotification(notification){
	$('.eth_balance').text(notification.eth_balance);
	$('.'+notification.token+'_balance').text(notification.token_balance);
	$('.eth_balance').text(notification.eth_balance);
	if( typeof txTable !=='undefined' ){
		txTable.DataTable().ajax.reload();
	}
	if( typeof ordersTable !=='undefined' ){
		ordersTable.DataTable().ajax.reload();
	}
	if( typeof walletsTable !=='undefined' ){
		walletsTable.DataTable().ajax.reload();
	}
	
	PNotify.success({
		title: notification.heading,
		hide:false,
		text: notification.message,
		modules: {
			Desktop: {
				desktop: true,
				fallback: false
			}
		}
	});
	
	PNotify.success({
		title: notification.heading,
		hide:false,
		text: notification.message,
	});
	
	
}