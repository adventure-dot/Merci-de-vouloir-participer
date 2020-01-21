var quiz = {
        user: "Dave",
        questions: [
            {
                text: "Jouez-vous à des jeux en ligne?  ",
                responses: [
                    {text: "OUI"},
                    {text: "NON" },
                    
                ]
            },
            {
                text: "Avez-vous un PC de jeu?  ",
                responses: [
                   
                    {text: "OUI"},
                    {text: "NON"},
                ]
            },
            {
                text: "Êtes-vous impliqué dans des communautés de jeux en ligne?  ",
                responses: [
                    {text: "OUI"},
                   
                    {text: "NON"},
                ]
            },
			
			{
                text: "Possédez-vous une playstation? ",
                responses: [
                    {text: "OUI"},
                   
                    {text: "NON"},
					
                ]
            },
			
			{
                text: "Jouez-vous souvent à des jeux différents?  ",
                responses: [
                    {text: "OUI"},
                   
                    {text: "NON"},
                ]
            },
			
			{
                text: "Si vous deviez choisir, quel serait votre type de jeu préféré?  ",
                responses: [
                    {text: "Stratégie en temps réel (RTS)"},
                   
                    {text: "Jeu de rôle (RPG)"},
					{text: "Sports"},
					{text: "Adventure"},

                ]
            },
			
			{
                text: "A votre avis, laquelle de ces 4 technologies de jeu est l'avenir?  ",
                responses: [
                    {text: "2D"},
                   
                    {text: "3D"},
					{text: "AR"},
					{text: "VR"},
                ]
            },
			
			{
                text: "Considérez-vous que les jeux vidéos sont un passe-temps?",
                responses: [
                    {text: "OUI"},
                   
                    {text: "NON"},
                ]
            },
			
			{
                text: "Avez-vous déjà possédé une gameboy?  ",
                responses: [
                    {text: "OUI"},
                   
                    {text: "NON"},
                ]
            },
			
			{
                text: "Joueriez-vous à des jeux en ligne plus souvent si vous le pouviez?",
                responses: [
                    {text: "OUI"},
                   
                    {text: "NON"},
					
                ]
            },
			
           
           
        ]
    },
    userResponseSkelaton = Array(quiz.questions.length).fill(null);

var app = new Vue({
    el: "#app",
    data: {
        quiz: quiz,
        questionIndex: 0,
        userResponses: userResponseSkelaton,
        isActive: false
        //console.log('Question : '+ this.questionIndex+1);

    },
    filters: {
        charIndex: function (i) {
            return String.fromCharCode(97 + i);
        }
    },
    methods: {
        checkAnswer: function () {
            let question = this.questionIndex + 1;
            let prev_question = this.questionIndex;
            console.log('Question ' + this.questionIndex + ' Answered');
            if (this.questionIndex < this.quiz.questions.length)
                var self = this;
            if (question !== 2) {
                self.questionIndex++;
            }
            else {
                document.querySelector("#ans-1").style.color = ' ';
                document.querySelector("#ans-1").style.color = ' ';
                setTimeout(function () {
                    self.questionIndex++;
                }, 50);
            }
        },
        selectOption: function (index) {
            Vue.set(this.userResponses, this.questionIndex, index);
            //console.log(this.userResponses);
        },
        next: function () {
            if (this.questionIndex < this.quiz.questions.length)
                this.questionIndex++;
        },

        prev: function () {
            if (this.quiz.questions.length > 0) this.questionIndex--;
        },
    }
});
