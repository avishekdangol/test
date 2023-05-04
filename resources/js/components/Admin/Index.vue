<template>
  <b-row>
    <b-col 
      md="2" 
      class="bg-dark-0 sidebar"
    >
      <h5><i class="fas fa-snowflake"></i> Dashboard</h5>
      <b-list-group>
        <b-list-group-item 
          class="bg-dark-1"          
        >
          <router-link class="btn-white-link" :to="{ name: 'month-exclusive' }">Month-Exclusive</router-link>
        </b-list-group-item>
      </b-list-group>
    </b-col>

    <b-col md="10">
      <router-view  />
    </b-col>
  </b-row>
</template>

<script>
import {
  BRow, BCol, BListGroup, BListGroupItem,
} from 'bootstrap-vue'

export default {
  components: {
    BRow, 
    BCol,
    BListGroup,
    BListGroupItem,
  }
}
</script>

<style scoped>
.router-link-active {
  color: #fff;
}
.sidebar {
  padding: 18px 0 18px 12px !important;
  height: 93vh;
  overflow-y: auto;
  scroll-behavior: smooth;
  position: sticky;
  top: 55px;
}
</style>
