<template>
  <div>
    <vue-good-table
      :columns="columns"
      :rows="posts"
      theme="nocturnal"
      @on-cell-click="editCell"
    >
      <template slot="table-row" slot-scope="props">
        <!-- Image -->
        <span v-if="props.column.field === 'image'">
          <img 
            class="img-preview mb-4" 
            :src="props.row.image" alt=""
          >
          <b-collapse 
            v-model="collapse[`image-${props.row.id}`]"
            :accordion="`post-${props.column.field}`"
          >
            <b-overlay :show="processing[props.column.field]"> 
              <b-form-input 
                v-model="form.image"
                type="text" 
                @click.stop
                @change="updatePost('image', props.row.originalIndex, props.row.id)"
              />
            </b-overlay>
            <small>Type and Press 'Enter'</small>
          </b-collapse>
        </span>

        <!-- Title -->
        <span 
          v-else-if="props.column.field === 'title'"
          class="title-row"
        >
          <div class="d-flex">
            <!-- Title Text -->
            <p class="mb-3">{{ props.row.title}}</p>
            <!-- Delete Button -->
            <b-badge 
              class="delete-btn ms-2 text-danger"
              v-b-modal.delete-post
              @click.stop="() => { selectedPost = props.row }"
            >
              <i class="fas fa-trash-can"></i>
            </b-badge>
          </div>
          <b-collapse
            v-model="collapse[`title-${props.row.id}`]"
            :accordion="`post-${props.column.field}`"
            class="mb-2"
          >
            <b-overlay :show="processing[props.column.field]"> 
              <b-form-input
                v-model="form.title"
                type="text"
                @click.stop
                @change="updatePost('title', props.row.originalIndex, props.row.id)"
              />
            </b-overlay>
            <small class="muted">Type and Press 'Enter'</small>
          </b-collapse>          
        </span>

        <!-- Category -->
        <span v-else-if="props.column.field === 'category'">
          <p 
            :id="`category-${props.row.id}`"
            class="mb-3"
          >{{ props.row.category}}</p>
          <b-collapse
            v-model="collapse[`category-${props.row.id}`]"
            :accordion="`post-${props.column.field}`"
          >
            <b-overlay :show="processing[props.column.field]"> 
              <b-form-input 
                v-model="form.category"
                list="category-list"
                @click.stop
                @change="updatePost('category', props.row.originalIndex, props.row.id)"
              />
            </b-overlay>

            <datalist id="category-list">
              <option value="Month-First Exclusive" />
              <option value="Month-Second Exclusive" />
              <option value="Month-Third Exclusive" />
              <option value="Month-Fourth Exclusive" />
              <option value="Month-Start Exclusive" />
              <option value="Mid-Month Exclusive" />
              <option value="Month-Last Exclusive" />
            </datalist>
            <small class="muted">Type and Press 'Enter'</small>
          </b-collapse>
        </span>

        <!-- Link -->
        <span v-else-if="props.column.field === 'link'">
          <p class="mb-3" v-if="props.row.link">{{ props.row.link}}</p>
          <p class="mb-3" v-else>No Link</p>
          <b-collapse
            v-model="collapse[`link-${props.row.id}`]"
            :accordion="`post-${props.column.field}`"
          >
            <b-overlay :show="processing[props.column.field]"> 
              <b-form-input
                v-model="form.link"
                type="text"
                @click.stop
                @change="updatePost('link', props.row.originalIndex, props.row.id)"
              />
            </b-overlay>
            <small class="muted">Type and Press 'Enter'</small>
          </b-collapse>
        </span>
      </template>
    </vue-good-table>  

    <!-- Delete Modal -->
    <b-modal
      v-if="selectedPost"
      ref="delete-post"
      id="delete-post"
      title="Delete Post"
      ok-title="Delete"
      ok-variant="danger"
      @ok="deletePost"
    >
      Are you sure you want to delete this post: {{ selectedPost.title }}?
    </b-modal>
  </div>
</template>

<script>
import api from '@/api'
import { ShadowBus } from '@/shadow-bus'
import { BModal, BCollapse, BFormInput, BFormGroup, BBadge, BOverlay } from 'bootstrap-vue'
import 'vue-good-table/dist/vue-good-table.css'
import { VueGoodTable } from 'vue-good-table'

export default {
  components: {
    BModal,
    BCollapse,
    BFormInput,
    BFormGroup,
    BBadge,
    BOverlay,
    VueGoodTable,
  },
  data() {
    return {
      posts: {},
      columns: [
        { label: 'Image Preview', field: 'image' },
        { label: 'Title', field: 'title' },
        { label: 'Category', field: 'category' },
        { label: 'Link', field: 'link', 'min-width': '40px' },
      ],
      collapse: {},
      processing: {},
      form: {},
      selectedPost: null,
    }
  },
  mounted() {
    this.getPosts()
    ShadowBus.$on('get-posts', this.getPosts)
  },
  methods: {
    getPosts() {
      api.get('/posts').then(response => {
        this.posts = response.data
      })
    },
    editCell(event) {
      const field = event.column.field
      const id = event.row.id

      // Toggle Collapse
      this.collapse[`${field}-${id}`] = !this.collapse[`${field}-${id}`]

      // Populates the form
      this.form.id = id
      this.form[field] = event.row[field]
      this.$nextTick(() => { this.processing[field] = false })
    },
    updatePost(type, index, id) {
      if (type != 'link' && !this.form[type]) return
      api.patch(`/posts/${this.form.id}`, this.form).then(response => {
        this.showSuccessMessage(response)
      }).then(() => {
        this.posts[index][type] = this.form[type]
        this.collapse[`${type}-${id}`] = false
      })
    },
    deletePost() {
      api.delete(`/posts/${this.selectedPost.id}`).then(response => {
        this.showSuccessMessage(response)
      }).then(() => {
        this.posts.splice(this.selectedPost.originalIndex, 1)
        this.$refs['delete-post'].hide()
        this.selectedPost = null
      })
    },
  },
}
</script>

<style scoped>
.img-preview {
  width: 200px;
  max-height: 200px;
  border: 1px solid;
}
.delete-btn {
  font-size: 16px;
  opacity: 0;
  transition: all 0.3s ease;
}
.title-row:hover .delete-btn {
  opacity: 1;
}
</style>
