<div class="row">
    <div class="col-md-12 margin-bottom-2 text-center">
		@if (env('FB_SECRET')!='YOURFACEBOOKsecretHERE')
			{!! HTML::icon_link(route('social.redirect',['provider' => '']), 'fa fa-facebook', '', array('class' => 'btn btn-social-icon btn-lg margin-half btn-facebook')) !!}
		@endif
		@if (env('TW_SECRET')!='YOURTWITTERkeyHERE')
			{!! HTML::icon_link(route('social.redirect',['provider' => '']), 'fa fa-twitter', '', array('class' => 'btn btn-social-icon btn-lg margin-half btn-twitter')) !!}
		@endif
		@if (env('GOOGLE_SECRET')!='YOURGOOGLEPLUSsecretHERE')
			{!! HTML::icon_link(route('social.redirect',['provider' => 'google']), 'fa fa-google-plus', '', array('class' => 'btn btn-social-icon btn-lg margin-half btn-google')) !!}
		@endif
		@if (env('GITHUB_SECRET')!='YOURSECRETHERE')
			{!! HTML::icon_link(route('social.redirect',['provider' => 'github']), 'fa fa-github', '', array('class' => 'btn btn-social-icon btn-lg margin-half btn-github')) !!}
		@endif
		@if (env('INSTAGRAM_SECRET')!='YOURSECRETHERE')
			{!! HTML::icon_link(route('social.redirect',['provider' => 'instagram']), 'fa fa-instagram', '', array('class' => 'btn btn-social-icon btn-lg margin-half btn-instagram')) !!}
		@endif
       
        
        
        
        
    </div>
</div>