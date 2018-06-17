/*Initialize you plugins here*/
$(document).ready(function() {
   $(".scrollbar").each(function(index, element) {
		$(element).slimScroll({
        	height:$(element).data('height')
    	});
	}); 
	 $('.select2').select2();
	var requestAuthorization = function(){
		 return new Promise(function(resolve, reject){
			swal({
				title: "Authorization Required",   
				text: "Your Login Password is required",
				input: "password",
				showCancelButton: true,
				showLoaderOnConfirm: true,
				animation: "slide-from-top",
				inputPlaceholder: "Enter Your Password" ,
				confirmButtonText: '<i class="fa fa-thumbs-up"> Authorize Action',
				cancelButtonText: '<i class="fa fa-thumbs-down"> Take Me Back',
				confirmButtonColor: "#DD6B55",
				preConfirm: function(inputValue) {
					return new Promise(function(resolve, reject) {
					  if (inputValue === "") {
						  reject('Please Enter Your Password!');
						} 
						resolve(inputValue);
					});
				},
			}).then(function(result){
				if (result.value) 
				resolve(result.value);
				else
				reject(false);
			});
		 });
	};
	
	
	
	$(document).on('click','a.ajax_link',function(e) {
		e.preventDefault();
		var urllink = $(this);
		if(urllink.hasClass('confirm')){
			var cfm = urllink.data('confirm');
			urllink.removeAttr('data-confirm');
			swal({
				  title: 'Are you sure?',
				  text: cfm,
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, Proceed!'
				}).then(function(result){
				  if (result.value) {
					  process(urllink);	
				  }
				});
			
		}else{
			process(urllink);
		}
		return true;
	});
	
	var process = function(urllink){
		var datam = urllink.data();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		if(urllink.hasClass('authorize')){
			 requestAuthorization().then(function(password){
				datam.password = password;
				ajax_post ( urllink , datam);
			});
		}else{
			
			ajax_post ( urllink , datam);
		}
	};
 	
	var ajax_post = function( urllink , datam){
		var urlk = urllink.attr('href');
		blockUI()
		$.ajax({
			type: 'POST',
			url: urlk,
			data: datam,
			success: function(data) {
				unblockUI();
				if(data.status =='ERROR'){
					swal('An Error Occured', data.message,'error');
						return false;
				}
				else if(data.status =='OK'||data.status =='SUCCESS'){
					if( typeof data.file !== 'undefined'){
						var text = data.file;
						var filename = data.filename;
						var blob = new Blob([text], {type: "text/plain;charset=utf-8"});
						saveAs(blob, filename+".txt");
					}
					if( typeof data.URL !== 'undefined' ){
						 window.setTimeout( function(){
							window.location.href = data.URL;
						 }, 3000 );
					 }
					 if(typeof urllink.attr('table')!=='undefined' &&urllink.attr('table')!=""){
						var tb = urllink.attr('table');
						tb = tb.split('|');
						$.each(tb, function(i,v){
							if(window[v] !=="undefined"){
								window[v].DataTable().draw();;
							}
						});
					 } 
					 swal('Operation successful', data.message ,'success');
				}
  			},
			error: function(){
				swal('Process Terminated', 'Indeterminate Error. Internet connection??','error' );
			}
		});
	};
	
	
	$('select.token').change(function(e) {
		var fee = $(this).children(":selected").attr("fee");
		if(fee == 'gas'){
			$('.gaslimit').show();
			$('.gasprice').attr('placeholder','Gas Price (Optional)');
		}else if(fee=='txfee'){
			$('.gaslimit').hide();
			$('.gasprice').attr('placeholder','Tx fee (Optional)');
			
		}
	});
	
	
	
	$(document).on('submit','form.ajax_form',function(e) {
		e.preventDefault();
		var form  = this;
		if($(form).hasClass('authorize')){
			 requestAuthorization().then(function(password){
				$('#password,.password', $(form)).val(password);
				Ajax_submit(form);
			});
		}else{
			Ajax_submit(form);
		}
	});
	
	
	var Ajax_submit = function(xform){ // allow for file uploads
				var form = $(xform); 
			    var url = form.attr('action');
				blockUI();
				var btn = form.find(':submit');
				btn.button('loading');
				var formdata = new FormData(xform);
				$.ajax({
					url: url,
					type: "POST",
					data: formdata,
					mimeTypes:"multipart/form-data",
					contentType: false,
					cache: false,
					processData: false,
					success: function(data){
						unblockUI();
						if(data.status =='ERROR'){
							
							btn.button('reset');
							swal('An Error Occured', data.message,'error');
							return false;
						}
						else if(data.status =='OK'||data.status =='SUCCESS'){
							btn.button('reset');
							if( typeof data.file !== 'undefined'){
								var text = data.file;
								var filename = data.filename;
								var blob = new Blob([text], {type: "text/plain;charset=utf-8"});
								saveAs(blob, filename+".txt");
							}
							if( typeof data.URL !== 'undefined' ){
								 window.setTimeout( function(){
									window.location.href = data.URL;
								 }, 3000 );
							 }
							 if(typeof form.data('table')!=='undefined'&&form.data('table')!=""){
								var tb = form.data('table');
								tb = tb.split('|');
								$.each(tb, function(i,v){
									if(window[v] !=="undefined"){
										window[v].DataTable().draw();;
									}
								});
								
							 }
							 swal('Operation successful', data.message ,'success');
							 if(typeof form.data('edit') ==='undefined'){
							 	form.find(':input').not(':button, :submit, :reset, :hidden').removeAttr('checked').removeAttr('selected').not('‌​:checkbox, :radio, select').val('');
							 }
					
						}
					},
					error: function(xhr, status, error) {
						var data = $.parseJSON(xhr.responseText);
						unblockUI();
						btn.button('reset');
						if(typeof data.errors !=='undefined'){
							$.each(data.errors, function(i,v){
								$("#" + i).notify(v, {position: 'bottom'});
							});
							if (window.grecaptcha) grecaptcha.reset();
							return false;
						} else{
							swal('Process Terminated', 'Indeterminate Error. Internet connection??','error' );
						}
					}
				});
	};
		



	
				
				
				
		
		
		  var  blockUI = function(options) {
            options = $.extend(true, {}, options);
            var html = '';
            if (options.animate) {
                html = '<div class="loading-message ' + (options.boxed ? 'loading-message-boxed' : '') + '">' + '<div class="block-spinner-bar"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>' + '</div>';
            } else if (options.iconOnly) {
                html = '<div class="loading-message ' + (options.boxed ? 'loading-message-boxed' : '') + '"><img src="/assets/img/loading-spinner-grey.gif" align=""></div>';
            } else if (options.textOnly) {
                html = '<div class="loading-message ' + (options.boxed ? 'loading-message-boxed' : '') + '"><span>&nbsp;&nbsp;' + (options.message ? options.message : 'LOADING...') + '</span></div>';
            } else {
                html = '<div class="loading-message ' + (options.boxed ? 'loading-message-boxed' : '') + '"><img src="/assets/img/loading-spinner-grey.gif" align=""><span>&nbsp;&nbsp;' + (options.message ? options.message : 'LOADING...') + '</span></div>';
            }
            if (options.target) { // element blocking
                var el = $(options.target);
                if (el.height() <= ($(window).height())) {
                    options.cenrerY = true;
                }
                el.block({
                    message: html,
                    baseZ: options.zIndex ? options.zIndex : 1000,
                    centerY: options.cenrerY !== undefined ? options.cenrerY : false,
                    css: {
                        top: '10%',
                        border: '0',
                        padding: '0',
                        backgroundColor: 'none'
                    },
                    overlayCSS: {
                        backgroundColor: options.overlayColor ? options.overlayColor : '#555',
                        opacity: options.boxed ? 0.05 : 0.1,
                        cursor: 'wait'
                    }
                });
            } else { // page blocking
                $.blockUI({
                    message: html,
                    baseZ: options.zIndex ? options.zIndex : 1000,
                    css: {
                        border: '0',
                        padding: '0',
                        backgroundColor: 'none'
                    },
                    overlayCSS: {
                        backgroundColor: options.overlayColor ? options.overlayColor : '#555',
                        opacity: options.boxed ? 0.05 : 0.1,
                        cursor: 'wait'
                    }
                });
            }
        };

        // function to  un-block element(finish loading)
       var  unblockUI = function(target) {
            if (target) {
                $(target).unblock({
                    onUnblock: function() {
                        $(target).css('position', '');
                        $(target).css('zoom', '');
                    }
                });
            } else {
                $.unblockUI();
            }
        };
		
		
		
			
	/*new PNotify({
	  title: "PNotify",
	  type: "info",
	  text: "Welcome. Try hovering over me. You can click things behind me, because I'm non-blocking.",
	  nonblock: {
		  nonblock: true
	  },
	  addclass: 'dark',
	  styling: 'bootstrap3',
	  hide: false,
	  before_close: function(PNotify) {
		PNotify.update({
		  title: PNotify.options.title + " - Enjoy your Stay",
		  before_close: null
		});

		PNotify.queueRemove();

		return false;
	  }
	});*/
	if($('#coins').length){
		 $('#coins').DataTable( {
				//serverSide: true,
				ordering: true,
				searching: true,
				dom : "lfrti",
				lengthChange: false,
			   // ajax: '/tokens/table',
				scrollY: 450,
				scroller: {
					loadingIndicator: true
				}
			
		
		});
	}
	
	$('#contract').change(function(e) {
		var nex = $(this).val();
		$('.tokendetail').fadeOut();
		$('#d'+nex).fadeIn();
	});
	  
	$("#amount").keyup(function() {         
		var amt = $(this).val();
		var bonus = $('#bonus').attr('bonus');
		var rate = $('#ethereum').attr('rate');
		var eth = parseFloat(amt)/parseFloat(rate);
		$('#ethereum').text('ETH '+ eth.toFixed(8));
		var bon = bonus*amt;
		$('#bonus').text(bon.toFixed(2));
		$('a.buynow').attr('data-amount',eth);
		$('a.usewallet').attr('data-amount',eth);
		$('#eth').val(eth);
	});
	
	$('.metamask.buynow').click(function(e) {
		if (typeof web3 === 'undefined') {
			swal('Install Metamask','You need to install MetaMask to use this feature.  https://metamask.io', 'error');
			return false;
		}
		var user_address;
		web3.eth.getAccounts(function(err, accounts){
			if (err != null) {
				console.error("An error occurred: "+err);
			}else if (accounts.length == 0) {
				swal('Login in Metamask','You need to Login into MetaMask to use this feature.', 'error');			}else {
				user_address = accounts[0];
			}
		});
		var provider = web3.currentProvider;
		var metamask = new Web3( provider);
		var chainid = $(this).data('chainid');
		var amount = $(this).data('amount');
		var to = $(this).data('to');
		console.log(chainid,amount,to);
		var user_address = web3.eth.accounts[0];
		metamask.eth.sendTransaction({
			to: to,
			from: user_address,
			value: web3.toWei(amount, 'ether'),
			chainId: chainid
		  }, function (err, transactionHash) {
			if (err) return swal('Error Encountered', err.message , 'error');
			var datam ={};
			datam.amount = amount;
			datam.token_id = $(this).data('token_id');
			datam.tx_hash = transactionHash;
			ajax_post($(this), datam );
		  });
	});
	
	$('.datetime').daterangepicker({
		"singleDatePicker": true,
		"timePicker": true,
		"timePicker24Hour": true,
		"timePickerIncrement": 10,
		"timePickerSeconds": true, 
		"autoApply": true,
		"locale": {
			"format": "YYYY-MM-DD HH:mm:ss",
			"separator": " - ",
			"applyLabel": "Apply",
			"cancelLabel": "Cancel",
			"fromLabel": "From",
			"toLabel": "To",
			"customRangeLabel": "Custom",
			"weekLabel": "W",
			"daysOfWeek": [
				"Su",
				"Mo",
				"Tu",
				"We",
				"Th",
				"Fr",
				"Sa"
			],
			"monthNames": [
				"January",
				"February",
				"March",
				"April",
				"May",
				"June",
				"July",
				"August",
				"September",
				"October",
				"November",
				"December"
			],
			"firstDay": 1
		},
		"linkedCalendars": false
	}, function(start, end, label) {
	  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
	});

	$('.copy').hover(function() { 
			$('.copy-text', $(this).closest('div')).fadeIn(); 
		}, function() { 
			$('.copy-text', $(this).closest('div')).fadeOut();  
		}).click(function() {
			var cpdv = $('.copy-text', $(this).closest('div'));
			cpdv.attr('data-text', 'copied');
			cpdv.addClass('flash');
			clipboard.writeText($(this).data('copythis'));
			setTimeout(function() {
			  cpdv.removeClass('flash').removeAttr('data-text');
			}, 1000);
		});
	
});