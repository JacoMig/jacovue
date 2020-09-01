<template>
    <div>
         
        <div class="form__notification" v-bind:class="[formSent ? 'visible' : '']">
            <h2>Thank you!<br>Your message has been sent.</h2>
        </div>
        <div class="form">
            <div>
                <input
                id="name"
                v-model="name"
                class="form__field"
                type="text"
                name="name"
                v-bind:placeholder="placeholders.name"
                v-bind:class="[hasError.name ? 'text-danger' : '']"
                >
            </div>

            <div>
                <input
                id="email"
                v-model="email"
                class="form__field"
                type="email"
                name="email"
                :placeholder="placeholders.email"
                v-bind:class="[hasError.email ? 'text-danger' : '']"
                >
            </div>

            <div>
                <input
                id="subject"
                v-model="subject"
                class="form__field"
                type="text"
                name="subject"
                :placeholder="placeholders.subject"
                v-bind:class="[hasError.subject ? 'text-danger' : '']"
                >
            </div>

            <div>
                <textarea
                id="Message"
                class="form__field"
                v-model="message"
                name="message"
                :placeholder="placeholders.message"
                ></textarea>
            </div>

            <div>
                <button class="btn" @click="checkForm">Send</button> 
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';


export default {
    data(){
        return {
            errors: [],
            placeholders:{name : "Your Name", email: "YourEmail@domain.com", subject:"Subject", message: "Your Message"},
            name: null,
            email: null,
            subject: null,
            message: null,
            hasError: {
                'name' : false,
                'email' : false,
                'subject' : false
            },
            formSent: false
        }
    },
    methods: {
        checkForm(e){
            this.errors = [];
            for (var key in this.hasError) {
                this.hasError[key] = false
            }
            if(!this.name){
                this.errors.push('Name required!');
                this.placeholders.name = 'Name required!';
                this.hasError.name = true
            }else{
                this.hasError.name = false
            }
            if (!this.email) {
                this.errors.push('Email required!');
                this.placeholders.email = 'Email required!';
                this.hasError.email = true
            } else if (!this.validEmail(this.email)) {
                this.errors.push('Valid email required!');
                this.email = 'Valid Email required!';
                this.hasError.email = true
            }else{
                this.hasError.email = false
            }
            if(!this.subject){
                this.errors.push('Subject required!');
                this.placeholders.subject = 'Subject required!';
                this.hasError.subject = true
            }else{
                this.hasError.subject = false
            }

            if (!this.errors.length) {
                this.sendForm();
               // return true       
            }else{
                console.log(this.errors);
               // return false;
            }
            
            return false
        },
        validEmail: function (email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        sendForm(){
            console.log('Sending Form');
            
            var formData = new FormData()
            formData.append('name', this.name)
            formData.append('email', this.email)
            formData.append('subject', this.subject)
            formData.append('message', this.message)

            for (var pair of formData.entries())
            {
             console.log(pair[0]+ ' : '+ pair[1]); 
            } 
            axios.post('./php/sendmail.php', formData, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                withCredentials : false
            })
            .then(resp => {
                this.formSent = true
                window.scrollTo(0,0)
                
                console.log(resp.data)
            }) 
            .catch(function(res) {
                if(res instanceof Error) {
                console.log(res.message);
                } else {
                console.log(res.data);
                }
            });  
        }
    },
    mounted(){
        const formFields = document.querySelectorAll('.form__field');
        formFields.forEach(field => {
            field.addEventListener('focus', function(e){
                e.target.value = ""
            })
        })

    }
}
</script>
