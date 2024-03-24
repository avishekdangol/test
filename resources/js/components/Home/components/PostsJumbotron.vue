<template>
  <!-- Jumbotron -->
    <div class="container mt-5">
      <h3 class="mb-2">What's new?</h3>

      <b-jumbotron
        class="waveya-jumbo bluish-glow rounded bg-dark-0 mb-4"
      >
        <div class="d-flex justify-content-between h-100">
          <!-- Left Side -->
          <b-overlay :show="isProcessing" variant="dark">
            <div class="left-side h-100 mr-4"
              v-if="selectedItem"
            >
              <img :src="selectedItem.image" class="h-100">
          
              <div class="jumbo-content bluish-glow p-4">
                <p class="lead mb-0">{{ selectedItem.title }}</p>
                <p class="muted">{{ selectedItem.category }}</p>
                <b-button 
                  class="bg-primary"
                  :href="selectedItem.link"
                  target="_blank"
                >
                  Get it now!
                  <i class="ms-2 fa-solid fa-up-right-from-square"></i>
                </b-button>
              </div>
            </div>
          </b-overlay>

          <!-- Right Side -->
          <vue-perfect-scrollbar>
            <div class="right-side">
              <div
                v-for="item, index in items"
                :key="item.id"
                class="cursor-pointer"
              >
                <b-card
                  :bg-variant="selectedItem.id == item.id ? 'dark-1 selected' : ''"
                  :title="item.title"
                  class="jumbo-card m-4"
                  img-left
                  @click="selectedItem.id != item.id ? selectItem(index) : ''"
                >
                  <b-card-text class="muted">{{ item.category }}</b-card-text>
                </b-card>
              </div>
            </div>
          </vue-perfect-scrollbar>
        </div>
      </b-jumbotron>
   
    </div>
</template>

<script>
import api from '@/api'
import VuePerfectScrollbar from 'vue-perfect-scrollbar'

import { 
  BJumbotron, BButton, BCard, BCardText, BOverlay,
} from 'bootstrap-vue'

export default {
  components: {
    BJumbotron, 
    BButton,
    BCard,
    BCardText,
    BOverlay,
    VuePerfectScrollbar,
  },
  data() {
    return {
      items: [],
      selectedItem: null,
      isProcessing: false,
    }
  },
  mounted() {
    this.getPosts()
  },
  methods: {
    getPosts() {
      api.get('/posts').then(response => {
        this.items = response.data
        this.selectedItem = this.items[0]
      })
    },
    selectItem(index) {
      this.isProcessing = true
      this.selectedItem = this.items[index]
      this.$nextTick(() => { this.isProcessing = false })
    }
  },
}
</script>

<style scoped>
.ps {
  height: 420px;
}
.waveya-jumbo {
  height: 420px;
  position: relative;
}
.jumbo-content {
  position: absolute;
  bottom: 0;
  width: 100%;
}
.card-body {
  padding-bottom: 0;
}
.card-img-left {
  height: 100px;
  width: auto;
}
.jumbo-card {
  transition: all 0.3s ease;
  border: 2px solid transparent;
}
.jumbo-card:hover,
.selected {
  border-color: #384361;
  box-shadow: 1px 1px 2px 3px #384361;
}
.card-title {
  margin-bottom: 0;
}
</style>
