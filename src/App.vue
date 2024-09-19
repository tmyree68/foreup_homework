<template>
<div class="container" id="autocomplete_app">
  <h3 align="center">ForeUp Homework: Marvel API Call</h3>
  <div class="row">
      <div class="col-md-6">
      <AutoComplete></AutoComplete>
    </div>
    <div>
      <SaveSearchCriteria></SaveSearchCriteria>
    </div>
   </div>
</div>
</template>

<script>
import AutoComplete from '@/components/AutoComplete.vue'
import SaveSearchCriteria from "@/SaveSearchCriteria.vue";

export default {
  components: {
    AutoComplete,
    SaveSearchCriteria
  }
}

</script>