function checkRangeValue(value){
	if(value<10){
		return "00000"+value
	}else if(value<100){
		return "0000"+value
	}else if(value<1000){
		return "000"+value
	}else{
		return "00"+value
	}
}

function checkValue(str, max) {
	if (str.charAt(0) !== '0' || str == '00') {
		var num = parseInt(str);
		if (isNaN(num) || num <= 0 || num > max) num = 1;
		str = num > parseInt(max.toString().charAt(0)) && num.toString().length == 1 ? '0' + num : num.toString();
	};
	return str;
};

const decimalNumber = (number) => new Intl.NumberFormat('en-US',{
	style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2
}).format(number);
