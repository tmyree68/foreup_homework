<template>
  <div>
    <input type="text" placeholder="Enter Character Name to save..." v-model="the_image_name"  value="the_character_name" class="form-control input-lg" />
    <div >
      <button class="btn btn-primary" @click= "saveCharacterSearch();"/>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "SaveSearchCriteria",
  data:function(){
    return{
      the_image_url:'',
      the_image_name:'',
      the_response_message:'',
    }
  },
  methods:{
    saveCharacterSearch:function(){
      axios.post('http://localhost/marveldb.php', {
        the_image_name:this.the_image_name
      }).then(response => {
        this.the_response_message = response.data.message

      });
    },
    getName:function(name){
      this.the_character_name = name;
      this.search_data = [];
    }
  }
}
</script>


<style scoped>

</style>