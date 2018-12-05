$(function () {
	$('#submit').click(function() {
		$.ajax({
	        url : "{{route('login')}}",
	        method : "POST",
	        data : {
	          "_token": "{{ csrf_token() }}"
	          // "terpilih" : terpilih
	        }
      }).done(function(hasil){
        // $('#stafKasi').html(hasil);
	        console.log(hasil)
      });
	});

})