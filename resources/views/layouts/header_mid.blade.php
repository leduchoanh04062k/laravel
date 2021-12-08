<div class="d-flex" style="align-items:center;height:100%;background-color: white;flex-grow: 3;justify-content: flex-end;">
	<div class="mg-r-10 ">
		<i class="fas fa-temperature-high tx-28" style="color: #ed6b75"></i>
		<span class="tx-24 tx-gray-600 nhietDo" style="color: #26c281">0&#176C</span>
	</div>
	<div class="mg-r-10 d-flex" style="height:100%;align-items:center;">
		<div style="height:100%;">
			<img src="http://openweathermap.org/img/wn/10d@2x.png" alt="weather-icon" class="weather__icon" style="color: gray;height:100%;">
		</div>
		
		<span class="tx-24 tx-gray-600 doAm" style="color:#26c281" >0%</span>
	</div>
	<div class="mg-r-10  d-md-block" style="display:none;color:#3598dc">
		<i class="far fa-calendar-times tx-28"></i>
		<strong class="hienThiNgay tx-20"></strong>
	</div><!-- input-group -->
</div><!-- br-header-mid -->

<script>
	const APP_ID = "5a3bff4524eded1ac41620d84924d9c3";
	let nhietDo = $('.nhietDo');
	let doAm = $('.doAm');
	let weather__icon = $('.weather__icon');
	n =  new Date();
	y = n.getFullYear();
	m = n.getMonth() + 1;
	d = n.getDate();
	$('.hienThiNgay').html(d + "/" + m + "/" + y);
	fetch(`https://api.openweathermap.org/data/2.5/weather?q=hanoi&appid=${APP_ID}&units=metric&lang=vi`)
	.then(async res => {
		const data = await res.json();
		console.log(data);
		nhietDo.html(data.main.temp + "&#176C");
		doAm.html(data.main.humidity + "%");
		weather__icon.attr('src',`http://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`)
	});
</script>