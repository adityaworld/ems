<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Exam</title>
   <!--<meta name="description" content="">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta name="robots" content="all,follow">-->
    <meta name="mobile-web-app-capable" content="yes"> 
      <!-- Bootstrap CSS-->
    <link href="{!! asset('design/students/assets/css/bootstrap.min.css') !!}" rel="stylesheet" />
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
<!--    <link rel="stylesheet" href="css/style.green.css" id="theme-stylesheet">-->
    <link href="{!! asset('design/students/assets/css/style.green.css') !!}" rel="stylesheet" />
    <!-- Custom stylesheet - for your changes-->
    <link href="{!! asset('design/students/assets/css/custom.css') !!}" rel="stylesheet" />

	<style>
		.qActive {
			color: #fff!important;
			border: 1px solid #750fc8!important;
			background: #750fc8!important;
		}
	</style>
	<!-- end -->
  </head>
  {{-- @dd($alldata['testdetails'][0]['duration']) --}}
  <body>
    <div class="page home-page">
      <!-- Main Navbar-->
      <header class="header">
         <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              
              <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-brand">
                  <div class="brand-text brand-big hidden-lg-down"><span>{{$alldata['testdetails'][0]['exam_name']}}</span><strong>&nbsp;Exam</strong></div>
                  <div class="brand-text brand-small"><strong>{{$alldata['testdetails'][0]['exam_name']}}</strong></div></a>
              </div>
              
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                
                <li class="nav-item"><a href="javascript:void(0);" class="nav-link logout">Exit Exam<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav> 
      </header>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        
        <div class="content-inner">
            <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Exam : {{$alldata['testdetails'][0]['exam_name']}}  <span class="pull-right" tval={{$alldata['testdetails'][0]['duration']}}>Time : &nbsp;<i id="timeelapsed"> {{$alldata['testdetails'][0]['duration']}}&nbsp;minute</i> </span> </h2>
            </div>
          </header>
     
            
            <!-- Updates Section -->
            <section class="exam">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Trending Articles-->
                        <div class="col-lg-4">
                          <div class="articles card">
                            <div class="card-header d-flex align-items-center">
                              <h2 class="h3">Select Question</h2>
                            </div>
                            <div class="card-body">
                                <ul class="exammodel">
									@for($i=1;$i<= count($alldata['allquestions']);$i++)
										@if($i==1)
											<li><a href="javascript:void(0)" class="nxtquestion qActive" id="qcheck{{$i-1}}" qindex="{{$i-1}}">{{$i}}</a></li>
										@else
											<li><a href="javascript:void(0)" class="nxtquestion" id="qcheck{{$i-1}}" qindex="{{$i-1}}">{{$i}}</a></li>
										@endif
									@endfor
                                </ul>
                            </div>
                          </div>
                        </div>
                        
                        <!--question-section-->
                        
                        <div class="col-lg-8">
                            <div class="articles card">
                                <div class="card-close">
                                    <div class="dropdown">
                                        <p>Total Marks: <span><b>{{ $alldata['testdetails'][0]['total_marks'] }}</b></span></p>
                                    </div>
                                </div>
                                <div class="card-header d-flex align-items-center">
                                    <h2 class="h3"><span id="qcount">1</span>. Question</h2>
                                </div>
								@if(count($alldata['allquestions']) > 0)
								@php($i = 0)
								@foreach($alldata['allquestions'] as $questions)
									<div class="card-body" id="questionview{{$i}}"  @if($i != 0) style="display: none;" @endif>
									
									  <p>{{$questions['question']}}</p>
										<br/>
									  <form>
										<div class="checkbox">
											<label>
											  <input type="radio" value="a" name="answer" qid={{$questions['id']}} qindex={{$i}}>
											  {{$questions['option_one']}}
											</label>
										</div>
										<div class="checkbox">
											<label>
											  <input type="radio" value="b" name="answer" qid={{$questions['id']}} qindex={{$i}}>
											  {{$questions['option_two']}}
											</label>
										</div>
										<div class="checkbox">
											<label>
											  <input type="radio" value="c" name="answer" qid={{$questions['id']}} qindex={{$i}}>
											  {{$questions['option_three']}}
											</label>
										</div>
										<div class="checkbox">
											<label>
											  <input type="radio" value="d" name="answer" qid={{$questions['id']}} qindex={{$i}}>
											  {{$questions['option_four']}}
											</label>
										</div>
										  
										<br/>
										<div class="form-group">     
											@if(count($alldata['allquestions']) == $i+1)
												<input type="submit" class="btn btn-primary" style="float:right;" qindex={{$i+1}} value="Submit Test" onClick="alert('Exam submit functionality not done.  &#128517; &#128517; &#128517; ');">
											@else
												<a href="javascript:void(0)" class="btn btn-primary nxtquestiontwo" style="float:right;" qindex={{$i+1}}>Next</a>
											@endif
										 
										</div>
									  </form>
									  @php($i++)
									</div>
								@endforeach
								@endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			
          <!-- Page Footer-->
          <footer class="main-footer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<p>Copyright &copy; {{ date('Y') }} <a href="javascript:void(0)">EMS </a>. All right reserved.</p>
					</div>
				</div>
		</footer>
        </div>
      </div>
	  <input type="hidden" id="oldindex" value="0" >
    </div>
   
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{!! asset('design/students/assets/js/tether.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('design/students/assets/js/bootstrap.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('design/students/assets/js/jquery.cookie.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('design/students/assets/js/jquery.validate.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('design/students/assets/js/chart.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('design/students/assets/js/charts-home.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('design/students/assets/js/front.js') !!}" type="text/javascript"></script>
	
	<!-- exam page script section -->
	<script type="text/javascript">
	
		var questions = {!! str_replace("'", "\'", json_encode($questions)) !!};
		var answers=[];
		var time_taken=0;//minutes
		var csrf_field = '{{ csrf_field() }}';
		var intervalins='';
		var exam_time={{$alldata['testdetails'][0]['duration']}};
		var initiatite=true;
		var intervattime = (1000*60);
		var lastMent=60;//second
		$(document).ready(function(){
			$(".logout").bind('click',function(){
				if(confirm("Are you sure?\nYou want to exit from the exam.")){
					window.close();
				}
			});
	
			intervalins = setInterval(function(){
				if(initiatite){
					++time_taken;
					if(time_taken==exam_time){
						clearInterval(intervalins);
						examsubmit();
					}
					else{
						if((exam_time-time_taken)==1){
							$("#timeelapsed").attr('style','color:red;');
							clearInterval(intervalins);
							intervalins = setInterval(function(){
								--lastMent;
								$("#timeelapsed").html((lastMent)+'&nbsp;second');
								if(lastMent==0){
									++time_taken;
									clearInterval(intervalins);
									examsubmit();
								}
							},1000);
						}
						else{
							$("#timeelapsed").html((exam_time-time_taken)+'&nbsp;minute');
						}
					}
				}
				initiatite=true;
			},intervattime);
		});
		
		// saved the answer
		$(document).on('click','input[name="answer"]',function(e){
			var qid = $(e.currentTarget).attr('qid');
			var ans = $(e.currentTarget).val();
			var qindex = $(e.currentTarget).attr('qindex');
			//save the answere in the question object
			var length = questions.length;
			if(qindex>=0 && qindex<length){
				questions[qindex]['given_ans']=ans;
			}
		});
		
		// submit the answers 
		$(document).on('click','.submitans',function(e){
			if(confirm("Are you sure?\nYou want to submit your paper.")){
				// do the submit section
				clearInterval(intervalins);
				examsubmit();
			}
		});
		

		function validateChecked(qindex){
			var length = questions.length;
			if(qindex>=0 && qindex<length){
				var question = questions[qindex];
				var given_ans = question['given_ans'];
				// ans given
				if(given_ans!='undefine'){
					$.each($('input[name="answer"]'),function(i,item){
						if(given_ans==$(item).val()){
							$(item).prop('checked',true);
						}
					});
				}
			}
		}
		
		function examsubmit(){
			var frmHtml='<div style="display:none;"><form action="submit" method="post">'+csrf_field+'\
			<input type="hidden" id="ansquestion" name="questions" value="">\
			<input type="hidden" name="time_taken" value="'+time_taken+'">\
			<input type="submit" id="anssubmit"></form></div>';
			$("html body").append(frmHtml);
			$("#ansquestion").val(JSON.stringify(questions));
			$("#anssubmit").trigger("click");
		}

		$('.nxtquestion').on('click',function(){
			var oldindex = $('#oldindex').val();
			var imdexkey = $(this).attr('qindex');
			if(oldindex != imdexkey){
			console.log(imdexkey);
			$('#questionview'+imdexkey).css('display','block');
			$('#questionview'+oldindex).css('display','none');
			$("#qcount").html(parseInt(imdexkey)+1);
			$('#qcheck'+imdexkey).addClass('qActive');
			$('#qcheck'+oldindex).removeClass('qActive');
			$('#oldindex').val(imdexkey);
			}
		});


		$('.nxtquestiontwo').on('click',function(){
			var oldindex = $('#oldindex').val();
			var imdexkey = $(this).attr('qindex');
			var totalquestion = {{count($alldata['allquestions'])}};
			console.log(imdexkey);
			if(oldindex != imdexkey && imdexkey < totalquestion){
			
			$('#questionview'+imdexkey).css('display','block');
			$('#questionview'+oldindex).css('display','none');
			$("#qcount").html(parseInt(imdexkey)+1);

			$('#qcheck'+imdexkey).addClass('qActive');
			$('#qcheck'+oldindex).removeClass('qActive');
			$('#oldindex').val(imdexkey);
			}
		});
	</script>
	<!-- script end of exam page -->
  </body>
</html>