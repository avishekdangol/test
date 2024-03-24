<template>
  <b-modal 
    class="bg-dark-0"
    id="month-exclusive"
    ref="month-exclusive"
    title="Month-Exclusive Post"
    ok-title="Submit"
    @ok="onSubmit"
    @hidden="form = {}"
  >
    <validation-observer ref="postForm">
      <form @submit.prevent="onSubmit">
        <!-- Title -->
        <validation-provider
          name="Title"
          rules="required"
          #default="{ errors }"
        >
          <b-form-group 
            label="Title"
            class="mb-2"
          >
            <b-form-input 
              v-model="form.title"
              placeholder="Title"
              type="text"
            />
            <small class="text-danger">{{ errors[0] }}</small>
          </b-form-group>
        </validation-provider>

        <!-- Category -->
        <validation-provider
          name="Category"
          rules="required"
          #default="{ errors }"
        >
          <b-form-group 
            label="Category"
            class="mb-2"
          >
            <b-form-input 
              v-model="form.category"
              placeholder="Category"
              list="category-list"
            />

            <datalist id="category-list">
              <option value="Month-Start Exclusive" />
              <option value="Month-Second Exclusive" />
              <option value="Month-Third Exclusive" />
              <option value="Month-Fourth Exclusive" />
              <option value="Month-Start Livestream" />
              <option value="Mid-Month Livestream" />
              <option value="Month-Last Livestream" />
              <option value="Month-Bonus Exclusive" />
            </datalist>
            <small class="text-danger">{{ errors[0] }}</small>
          </b-form-group>
        </validation-provider>

        <!-- Link -->
        <validation-provider
          name="Link"
          #default="{ errors }"
        >
          <b-form-group
            label="Link"
            class="mb-2"
          >
            <b-form-input
              v-model="form.link"
              type="text"
              placeholder="Link"
            />
            <small class="text-danger">{{ errors[0] }}</small>
          </b-form-group>
        </validation-provider>

        <!-- Image -->
        <validation-provider
          name="Image"            
          #default="{ errors }"
          rules="required"
        >
          <b-form-group
            class="mb-2"
            label="Image"
          >
            <b-form-input
              type="text"
              v-model="form.image"
              placeholder="Image Link"
            />
            <small class="text-danger">{{ errors[0] }}</small>
          </b-form-group>
        </validation-provider>
      </form>
    </validation-observer>
    
  </b-modal>
</template>

<script>
import api from '@/api'
import { ShadowBus } from '@/shadow-bus'
import { BModal, BFormGroup, BFormInput } from 'bootstrap-vue'
import { ValidationObserver, ValidationProvider } from 'vee-validate/dist/vee-validate.full'

export default {
  components: {
    BModal,
    BFormGroup,
    BFormInput,
    ValidationObserver,
    ValidationProvider,
  },
  data() {
    return {
      form: {},
    }
  },
  methods: {
    onSubmit(bvModalEvent) {
      bvModalEvent.preventDefault()
      this.$refs.postForm.validate()
      .then(success => {
        if (success) {
          api.post('/posts', this.form).then(response => {
            this.showSuccessMessage(response)
          }).then(() => {
            ShadowBus.$emit('get-posts')
            this.$refs['month-exclusive'].hide()
          })
        }
      })
    },
  },
}
</script>