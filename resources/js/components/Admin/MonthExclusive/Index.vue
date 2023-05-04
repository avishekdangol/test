<template>
  <div>
    <!-- Header with Buttons -->
    <div class="d-flex my-3">
      <b-button 
        v-b-modal.month-exclusive
        variant="primary" 
        class="mx-2"
      >
        Add New Post
      </b-button>
    </div>

    <!-- Main Content -->
    <post-table />

    <!-- Add/Edit Modal -->
    <create-edit />
  </div>
</template>

<script>

import {
  BButton,
} from 'bootstrap-vue'

import CreateEdit from './components/CreateEditPost.vue'
import PostTable from './components/PostTable.vue'

export default {
  components: {
    BButton,
    CreateEdit,
    PostTable,
  },
}
</script>
