<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="footer-logo-block">
					<a href="/" title="Бизнес платформа"><img src="{{ asset('img/logo-white.png') }}" width="139" height="66"></a>
					<h2 class="title-footer-big">Бизнес</h2>
					<h3 class="title-footer-medium">платформа</h3>
				</div>
			</div>
			<div class="col-md-3">
				<ul class="footer-contacts-wrapper">
					Контакты:
					@if(isset($contacts) && !empty($contacts))
						@foreach($contacts as $contact)
							<li class="footer-phone-1"><a href="tel:{{$contact->phone}}" title="{{$contact->phone}}">{{  $contact->phone }}</a></li>
							<li class="footer-phone-1"><a href="email:{{ $contact->email}}" title="{{$contact->email}}">{{  $contact->email }}</a></li>
							<li class="footer-phone-1"><a href="address:{{$contact->address}}" title="{{$contact->address}}">{{  $contact->address }}</a></li>
						@endforeach
					@else	
						<li class="footer-phone-1"><a href="#" target="_blank" title="">Номер 1</a></li>
						<li class="footer-phone-2"><a href="#" target="_blank" title="">Номер 2</a></li>
						<li class="footer-email-1"><a href="#" target="_blank" title="">Почта 1</a></li>
						<li class="footer-address-1"><a href="#" target="_blank" title="">Адрес 1</a></li>
						<li class="footer-address-2"><a href="#" target="_blank" title="">Адрес 2</a></li>	
					@endif
				</ul>
			</div>	
			<div class="col-md-3">
				<ul class="social">
					<li><a href="#" class="youtube"></a></li>	
					<li><a href="#" class="facebook"></a></li>
					<li><a href="#" class="insta"></a></li>			
				</ul>
			</div>	
			<div class="col-md-6">
				<div class="footer-black-block"></div>
			</div>
			<div class="col-md-3"></div>	
		</div>
	</div>
</div>
<div class="copyright-wrapper">
	<div class="container">
		<p class="copyright">All contents © copyright {{ $date }} BHub. All rights reserved. Designed by : Adilet Assan</p>
	</div>
</div>