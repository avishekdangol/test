<template>
  <b-card
    :title="title"
  >    
    <b-row>
      <b-col md="6">
        <!-- Comment Display Section -->
        <b-card class="bg-dark-1 bluish-glow">
          <div class="d-flex mb-2">
            <b-avatar 
              variant="primary"
              size="lg"
            />
            <div class="container-fluid">
              <b-card-title class="d-block">Avishek</b-card-title>
              <b-card-text>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis eaque porro ea quasi asperiores. Odio non ex similique quis itaque laboriosam inventore! Perspiciatis doloremque atque a architecto nisi repudiandae! Ex!
              </b-card-text>
            </div>
          </div>

          <div class="d-flex">
            <b-avatar 
              variant="primary"
              size="lg"
            />
            <div class="d-block">
              <b-card-title class="d-block">Avishek</b-card-title>
              <b-card-text>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis eaque porro ea quasi asperiores. Odio non ex similique quis itaque laboriosam inventore! Perspiciatis doloremque atque a architecto nisi repudiandae! Ex!
              </b-card-text>
            </div>
          </div>
        </b-card>

        <!-- Comment Post Section -->
        <b-form-textarea
          v-model="comment"
          type="text"
          placeholder="Say something ..."
        >
        </b-form-textarea>
        <b-button 
          class="bg-primary mt-2"
        >
          Post Comment
        </b-button>
      </b-col>

      <b-col md="6">

      </b-col>
    </b-row>
  </b-card>
</template>

<script>
import { BCol, BRow, BCard, BFormTextarea, BButton, BAvatar, BLink, } from 'bootstrap-vue'

export default {
  props: {
    title: {
      type: String,
      required: true,
    },
  },
  components: {
    BCol,
    BRow,
    BCard,
    BFormTextarea,
    BButton,
    BAvatar,
    BLink,
  },
  data() {
    return {
      comment: '',
    }
  },
}
</script>

<style scoped>

</style>
