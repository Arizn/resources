                
@push('css')
<style>

/***
Notes
***/
.note {
  margin: 0 0 20px 0;
  padding: 15px 30px 15px 15px;
  border-left: 5px solid #eee;
  -webkit-border-radius: 0 4px 4px 0;
  -moz-border-radius: 0 4px 4px 0;
  -ms-border-radius: 0 4px 4px 0;
  -o-border-radius: 0 4px 4px 0;
  border-radius: 0 4px 4px 0;
}
.note h1,
.note h2,
.note h3,
.note h4,
.note h5,
.note h6 {
  margin-top: 0;
}
.note h1 .close,
.note h2 .close,
.note h3 .close,
.note h4 .close,
.note h5 .close,
.note h6 .close {
  margin-right: -10px;
}
.note p {
  font-size: 13px;
}
.note p:last-child {
  margin-bottom: 0;
}
.note code,
.note .highlight {
  background-color: #fff;
}
.note.note-default {
  background-color: lightgray;
  border-color: #adadad;
  color: #333333;
}
.note.note-default.note-bordered {
  background-color: #c3c3c3;
  border-color: #a0a0a0;
}
.note.note-default.note-shadow {
  background-color: #c6c6c6;
  border-color: #a0a0a0;
  box-shadow: 5px 5px rgba(162, 162, 162, 0.2);
}
.note.note-primary {
  background-color: #5697d0;
  border-color: #3085a9;
  color: #D8E3F2;
}
.note.note-primary.note-bordered {
  background-color: #3e89c9;
  border-color: #2a7696;
}
.note.note-primary.note-shadow {
  background-color: #428bca;
  border-color: #2a7696;
  box-shadow: 5px 5px rgba(43, 121, 154, 0.2);
}
.note.note-success {
  background-color: #eef7ea;
  border-color: #c9e2b3;
  color: #3c763d;
}
.note.note-success.note-bordered {
  background-color: #dcefd4;
  border-color: #bbdba1;
}
.note.note-success.note-shadow {
  background-color: #dff0d8;
  border-color: #bbdba1;
  box-shadow: 5px 5px rgba(190, 220, 164, 0.2);
}
.note.note-info {
  background-color: #eef7fb;
  border-color: #a6e1ec;
  color: #31708f;
}
.note.note-info.note-bordered {
  background-color: #d5ebf6;
  border-color: #91d9e8;
}
.note.note-info.note-shadow {
  background-color: #d9edf7;
  border-color: #91d9e8;
  box-shadow: 5px 5px rgba(150, 219, 233, 0.2);
}
.note.note-warning {
  background-color: #fcf8e3;
  border-color: #f5d89e;
  color: #8a6d3b;
}
.note.note-warning.note-bordered {
  background-color: #f9f1c7;
  border-color: #f2cf87;
}
.note.note-warning.note-shadow {
  background-color: #faf2cc;
  border-color: #f2cf87;
  box-shadow: 5px 5px rgba(243, 209, 139, 0.2);
}
.note.note-danger {
  background-color: #f9f0f0;
  border-color: #e4b9c0;
  color: #a94442;
}
.note.note-danger.note-bordered {
  background-color: #f1dada;
  border-color: #dca7b0;
}
.note.note-danger.note-shadow {
  background-color: #f2dede;
  border-color: #dca7b0;
  box-shadow: 5px 5px rgba(222, 171, 179, 0.2);
}
</style>
@endpush
				<div class="col-md-12">
                       <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#details" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Details</a>
                          </li>
						 
                          <li role="presentation" class=""><a href="#comments" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Comments</a>
                          </li>
						 <li role="presentation" class=""><a href="#contract" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Contract</a>
                          </li>
						   @if($token->isAdmin)
                          <li role="presentation" class=""><a href="#admin" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Contract Admin</a>
                          </li>
						  <li role="presentation" class=""><a href="#icosales" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Sales</a>
                          </li>
						   @if($token->contract()->count()&& !empty(trim($token->contract->mainsale_abi))&& $token->isIco)
						  <li role="presentation" class=""><a href="#icoadmin" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">ICO (Mainsale) Admin</a>
						  
                          </li>
						   @endif
						   @else
						   <li role="presentation" class=""><a href="#icobuys" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Purchases</a>
                          </li>
						   @endif
                        </ul>
                        <div id="myTabContent" class="tab-content">
						
							
                          <div role="tabpanel" class="tab-pane fade active in" id="details" aria-labelledby="home-tab">
                            <p>{!!$token->description!!}</p>
							<p>{!!$token->features!!}</p>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="comments" aria-labelledby="profile-tab">
						   <div class="fb-comments" data-href="https://icofury.com/tokens/{{$token->symbol}}" data-numposts="10"></div>
                          </div>
						    
                          <div role="tabpanel" class="tab-pane fade" id="contract" aria-labelledby="profile-tab">
						  <div class="row">
							  <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
								  <div class="x_title">
									<h2>Smart Interaction</h2>
									<ul class="nav navbar-right panel_toolbox">
									  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
									  </li>
									  <li><a class="close-link"><i class="fa fa-close"></i></a>
									  </li>
									</ul>
									<div class="clearfix"></div>
								  </div>
								  <div class="x_content">
								 
									<br />
									{!!$html['public']!!}
								  </div>
								</div>
							  </div>
							</div>
						  
                          </div>
						 
						  @if($token->isAdmin)
                          <div role="tabpanel" class="tab-pane fade" id="admin" aria-labelledby="profile-tab">
						  <div class="row">
							  <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
								  <div class="x_title">
									<h2>Token Adminstration<small>Consumes gas!!</small></h2>
									<ul class="nav navbar-right panel_toolbox">
									  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
									  </li>
									  <li><a class="close-link"><i class="fa fa-close"></i></a>
									  </li>
									</ul>
									<div class="clearfix"></div>
								  </div>
								  <div class="x_content">
								  <h3>Functions that request your password will consume Gas</h3>
								     @if(!empty($adminMessage))
								    <div id="note" class="note note-warning">
										<h4 id="title" class="block">YOU MAY HAVE RESTRICTED ACCESS</h4>
										<p id="note_text">{{$adminMessage}}</p>
									</div>
								   @endif
									<br />
									{!!$html['admin']!!}
								  </div>
								</div>
							  </div>
							</div>
						  
                          </div>
						  @if($token->contract()->count()&& !empty(trim($token->contract->mainsale_abi))&& $token->isIco)
						  <div role="tabpanel" class="tab-pane fade" id="icoadmin" aria-labelledby="profile-tab">
						    <div class="row">
							  <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
								  <div class="x_title">
									<h2>ICO Contract Adminstration<small>May Consumes gas!!</small></h2>
									<ul class="nav navbar-right panel_toolbox">
									  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
									  </li>
									  <li><a class="close-link"><i class="fa fa-close"></i></a>
									  </li>
									</ul>
									<div class="clearfix"></div>
								  </div>
								  <div class="x_content">
								  	<h3>Functions that request you password will consume Gas</h3>
									<br />
									{!!$html['mainsale']!!}
								  </div>
								</div>
							  </div>
							</div>
						  
                          </div>
							  
							 
						 
						   @endif
						   <div role="tabpanel" class="tab-pane fade" id="icosales" aria-labelledby="profile-tab">
						   <div class="row">
							  <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
								  <div class="x_title">
									<h2>Token Sales</h2>
									<ul class="nav navbar-right panel_toolbox">
									  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
									  </li>
									  <li><a class="close-link"><i class="fa fa-close"></i></a>
									  </li>
									</ul>
									<div class="clearfix"></div>
								  </div>
								  <div class="x_content">
								  	<table id="icosaletable" class="table table-striped table-bordered">
										<thead>
											<tr> 
												<th >Date</th>
												<th >Tokens</th>
												<th >Ether</th>
												<th >TxHash</th>
											</tr>
										</thead>
										<tbody>
										@foreach($token->icosales() as $sale)
											<tr>
												<td>{{$sale->created_at}}</td>
												<td>{{$sale->amount}}</td>
												<td>{{$sale->ether}}</td>
												<td>{{$sale->ether_txhash}}</td>
											</tr>
										@endforeach
										</tbody>
									</table>
									@push('scripts')
										<script>
										$(document).ready(function(e) {
 											window.saleTable = $('#icosaletable').dataTable({
												"order": [[1, 'desc' ]],
												"lengthMenu": [4, 10, 15],
												"pageLength": 10,
												"language": language
											
											});
										
										});
											</script>
										@endpush
								  </div>
								</div>
							  </div>
							</div>
						  
                          </div>
						  @else
						  <div role="tabpanel" class="tab-pane fade" id="icobuys" aria-labelledby="profile-tab">
						   <div class="row">
							  <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
								  <div class="x_title">
									<h2>Token Purchases</h2>
									<ul class="nav navbar-right panel_toolbox">
									  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
									  </li>
									  <li><a class="close-link"><i class="fa fa-close"></i></a>
									  </li>
									</ul>
									<div class="clearfix"></div>
								  </div>
								  <div class="x_content">
								  	<table id="icobuytable" class="table table-striped table-bordered">
										<thead>
											<tr> 
												<th >Date</th>
												<th >Tokens</th>
												<th >Ether</th>
												<th >TxHash</th>
											</tr>
										</thead>
										<tbody>
										@foreach(auth()->user()->account->icopurchases as $buy)
											<tr>
												<td>{{$buy->created_at}}</td>
												<td>{{$buy->amount}}</td>
												<td>{{$buy->ether}}</td>
												<td>{{$buy->token_txhash}}</td>
											</tr>
										@endforeach
										</tbody>
									</table>
									@push('scripts')
										<script>
										$(document).ready(function(e) {
 											window.buyTable = $('#icobuytable').dataTable({
												"order": [[1, 'desc' ]],
												"lengthMenu": [4, 10, 15],
												"pageLength": 10,
												"language": language
											});
										
										});
											</script>
										@endpush
								  </div>
								</div>
							  </div>
							</div>
						  
                          </div>
						  
						  @endif
                        </div>
                      </div>

                    </div>
					
@push('scripts')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=233621603488112';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@endpush