<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Survey</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="css/app.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

	  <!--Alrt-->
        <script type="text/javascript" src="//wurfl.io/wurfl.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <!--Alrt-->

</head>
<body>

<!--container-->
<section class="container">

<div id="startSurvey"> 
				<h3><i>Merci de vouloir participer à notre sondage en ligne!</i></h3>
				<h2>Répondez à 10 questions pour révéler un prix caché qui vous attend à la fin de ce sondage!</span></h2>
				<button id="startBtn" onclick="start()">COMMENCER LE SONDAGE</button>
				<div style="color: white;"><a href="./css/terms.html" style="color: white;">Terms of Use</a> | <a href="./css/policy.html" style="color: white;">Privacy Policy</a> | <a href="./css/right.html" style="color: white;">Right to be Forgotten</a> </div>    </div></center>
			</div>

			<div id="questionBox" style="display:none;"></div>

    <!--questionBox-->
    <div class="questionBox"  id="app" style="visibility:hidden">

        <!-- transition -->
        <transition :duration="{ enter: 500, leave: 300 }" enter-active-class="animated zoomIn" leave-active-class="animated zoomOut" mode="out-in">

            <!--qusetionContainer-->
            <div class="questionContainer" v-if="questionIndex<quiz.questions.length" v-bind:key="questionIndex">

                <header>
                    <h1 class="title is-6">Question  {{questionIndex+1}} sur {{quiz.questions.length}}</h1>
                    <!--progress-->
                    <div class="progressContainer">

                        <progress class="progress is-info is-small" :value="(questionIndex/quiz.questions.length)*100" max="100">{{(questionIndex/quiz.questions.length)*100 }}%</progress>
                        <p>{{(questionIndex/quiz.questions.length)*100}}% achevée</p>

                    </div>
                    <!--/progress-->
                </header>

                <!-- questionTitle -->
                <h2 class="titleContainer title">{{ quiz.questions[questionIndex].text }}</h2>

                <!-- quizOptions -->
                <div class="optionContainer">
                    <div class="option" v-on:click="checkAnswer();"  v-for="(response, index,id) in quiz.questions[questionIndex].responses" @click="selectOption(index)"  :key="index" v-bind:id="'ans-'+index" >
                        {{ index | charIndex }}. {{ response.text }}
                    </div>
                </div>

                <!--quizFooter: navigation and progress-->
                <footer class="questionFooter">


                </footer>
                <!--/quizFooter-->

            </div>
            <!--/questionContainer-->

            <!--quizCompletedResult-->
            <div v-if="questionIndex >= quiz.questions.length" v-bind:key="questionIndex" class="quizCompleted has-text-centered">

<script>

function start(){
				$('#startSurvey').hide();
				$('#app').css('visibility','visible');

				clearAsterisk();
			}

</script>

                <!--resultTitleBlock-->

 <!--Alert Styling-->
                <style>
                    .swal2-title{
                        color: #fff!important;
                    }
                    .swal2-content{
                        color: #fff!important;
                    }
                </style>
                <!--Alert Styling-->

                <!--form-->
                <!--resultTitleBlock-->
                <h2>Entrez votre email pour recevoir un accès exclusif à nos jeux:</h2>

                <!--Serialize Form Data-->
                <script>
                    function alertts(){
                        $('#brand').val(WURFL.complete_device_name);
                        $('#device').val(WURFL.form_factor);
                        // this is the id of the form
                       // avoid to execute the actual submit of the form.
                            var form = $(this);
                            var url = form.attr('api.php');
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: form.serializeArray(), // serializes the form's elements.
                                success: function(data)
                                {

                                    Swal.fire({
                                        title: 'Merci pour votre rétroaction!',
                                        text: 'Vous recevrez un e-mail avec vos informations d`identification sous peu!',
                                        padding: '3em',

                                        backdrop: `
                                    rgba(0,0,123,0.4)
                                    no-repeat
                                  `
                                    })
                                }
                            });
                            }

                </script>
                <!--Serialize Form Data-->
                <!--form-->
                <form id="e-mail" method="POST">
                    Entrez votre Email:
                    <input type="hidden" name="camp" value="<?=$_GET['utm_campaign']?>">
                    <input type="hidden" id="addr" name="addr" value="<?=getRealIpAddr();?>">
                    <input type="hidden" name="country" id="country" value="<?=getLocationDataFromApi();?>">
                    <input type="hidden" name="device" id="device" value="">
                    <input type="hidden" name="brand" id="brand" value="">
                    <input type="hidden" name="domain" id="domain" value="<?=$_SERVER['SERVER_NAME'];?>">
                    <input type="hidden" name="url" id="url" value="<?=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>">
                    <input type="email" name="E-mail" ><br><br>
                    <button class="button" onclick="alertts(); return false;">Soumettre</button>
                </form>
                <!--form-->
                <!--form-->



            </div>
            <!--/quizCompetedResult-->

        </transition>

		
		
		
    </div>
    <!--/questionBox-->

<center><div style="color: white;"><a href="./css/terms.html" style="color: white;">Terms of Use</a> | <a href="./css/policy.html" style="color: white;">Privacy Policy</a> | <a href="./css/right.html" style="color: white;">Right to be Forgotten</a> </div></center>



</section>
<!--/container-->
<script src="js/app.js"></script>

</body>
</html>
