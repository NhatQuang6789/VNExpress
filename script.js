
$(document).ready(function(){
	$(document).on("click", "a", function(e){
		e.preventDefault();
		var link = $(this).attr("href");
		$.ajax({
			url: "content.php",
			method: "POST",
			data: {"link": link},
			success: function (data)
			{
				$(".box_content").html(data);
				$(".dialog_box").show(0);
			}
		})
	});
});