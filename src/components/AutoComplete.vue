<template>
  <div>
    <input type="text" placeholder="Enter Character Name..." v-model="the_character_name" @keyup="getData()" autocomplete="off" class="form-control input-lg" />
    <div class="panel-footer">
      <br/>
      <img :src="the_thumbnail" alt="">
   </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "AutoComplete",
  data:function(){
    return{
      the_character_name:'',
      search_data:[],
      the_thumbnail:'',
      the_image_url:'',
      the_response:'',
      size: 'standard_large.jpg',
    }
  },
  methods:{
    getData:function(){
      this.search_data = [];
      axios.post('http://localhost/marvelapi.php', {
        theCharacter:this.the_character_name
      }).then(response => {
        this.the_thumbnail = response.data

      });
    },
    getName:function(name){
      this.the_character_name = name;
      this.search_data = [];
    }
  }
}
</script>
