<!DOCTYPE html>
<html>
<head>
	<title>Progress</title>
	<link rel="stylesheet" type="text/css" href="progress.css">

	<!--Vue.js-->
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>

</head>
<body>



<div id="app">
		
	<div class="progress-bar"><div class="green" style="width:50%" v-bind:style="{width:progress+'%'}">{{Math.round(progress)+'%'}}</div></div>


	<div class="assignment-progress">
		<form action="#" name="myform">
		  	<?php

				$con=mysqli_connect("localhost","root","","webo");
				if(!$con)
				{
					die('Could not connect:'.mysqli_connect_error());
				}
				$result = mysqli_query($con,"SELECT assignments from details");
				while($row = mysqli_fetch_assoc($result))
				{
						$n=$row['assignments'];
			?>
			

			<div class="assignment"><font size="8"><input type="checkbox" v-on:click="percentagecompleted" name="check[]" value="Assignment1"></font><span class="a"><?php echo "$n" ;?></span></div> <br>
	   		
	   		<?php
		   		}
		   		mysqli_close($con);
	   		?>

	   	</form>
	</div>

</div>

<!-- Vue.js code -->

<script type="text/javascript">
   	
   var percentage=new Vue({
   	
   	el:'#app',
   	data:{
   		progress:0,
   	},

   	methods:{
	   		percentagecompleted:function(){
	   		
		   		var pr=document.myform.elements['check[]'];
		  		var l=pr.length;
		  		console.log(l);
			 	var check=0;
			 	for(var i=0;i<l;i++)
				{
				 
				  if(document.myform.elements['check[]'][i].checked)
				  {
				   	check+=1;	
				  	
				  }	
				}
				this.progress=((check / l)*100);
	   		},
   		},
   });

</script>
</body>
</html>