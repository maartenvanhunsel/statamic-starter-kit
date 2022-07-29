<template>
    <div>
        <button class="btn-primary" :disabled="deploying" @click="modal = true">
            <span>Trigger deployment</span>
        </button>
        <confirmation-modal
            v-if="modal"
            title="Deploy your site"
            body-text="Are you sure you want to deploy your site?"
            button-text="Deploy"
            danger="true"
            @confirm="deploy()"
            @cancel="modal = false"
        />
    </div>
</template>

<script>
export default {
    name: 'TriggerDeploy',
    props: {
        settings: {
            type: Object,
            default: () => {}
        }
    },
    data() {
        return {
            deploying: false,
            modal: false
        }
    },
    computed: {},
    methods: {
        deploy() {
            console.log(this.settings)
            this.$axios
                .post(this.settings.build_hook)
                .then(() => {
                    this.deploying = true
                    this.modal = false
                    this.$parent.$refs.deployment_log.fetch()
                    this.$toast.success(__('Site deploy triggered'))
                })
                .catch(function (error) {
                    console.log(error)
                })
        }
    }
}
</script>
