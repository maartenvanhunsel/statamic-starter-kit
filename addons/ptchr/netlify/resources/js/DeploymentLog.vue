<template>
    <div>
        <h3 class="flex pl-0 mb-1 little-heading">
            Deployment Log (latest 5)
            <span class="ml-auto cursor-pointer" @click="fetch()">reload</span>
        </h3>
        {{ settings }}
        <div class="p-0 mb-2 card">
            <table class="data-table">
                <tbody>
                    <template v-if="isLoading">
                        <tr v-for="log in 5" :key="log">
                            <td class="w-4 pr-0">
                                <div class="little-dot icon-status-live"></div>
                            </td>
                            <td>
                                <div
                                    class="skeleton"
                                    :style="{
                                        width: '125px',
                                        height: '19px'
                                    }"
                                ></div>

                                <small
                                    class="skeleton"
                                    :style="{
                                        width: '180px',
                                        height: '14px',
                                        display: 'block',
                                        marginTop: '6px'
                                    }"
                                >
                                </small>
                            </td>

                            <td
                                class="text-right"
                                :style="{
                                    width: '180px'
                                }"
                            >
                                <div
                                    class="skeleton"
                                    :style="{
                                        width: '125px',
                                        height: '16px',
                                        marginLeft: 'auto'
                                    }"
                                ></div>
                                <small
                                    class="skeleton"
                                    :style="{
                                        width: '180px',
                                        height: '14px',
                                        display: 'block',
                                        marginTop: '6px'
                                    }"
                                >
                                </small>
                            </td>
                        </tr>
                    </template>
                    <template v-else>
                        <tr v-for="log in logs" :key="log.id">
                            <td class="w-4 pr-0">
                                <div
                                    v-if="log.state === 'ready'"
                                    class="little-dot icon-status-live"
                                ></div>
                                <div
                                    v-if="log.state === 'new'"
                                    class="little-dot icon-status-draft"
                                ></div>
                                <div
                                    v-if="log.state === 'error'"
                                    class="little-dot icon-status-error"
                                ></div>
                            </td>
                            <td>
                                <div>
                                    <strong class="text-blue">
                                        <a
                                            :href="log.deploy_ssl_url"
                                            target="_blank"
                                            class="text-blue"
                                        >
                                            <span>{{ log.context }}</span> </a
                                        >:
                                    </strong>
                                    <span>{{ log.branch }}</span>
                                </div>
                                <small>
                                    {{ log.title }}
                                </small>
                            </td>

                            <td class="text-right">
                                <div>
                                    {{ $moment(log.created_at).fromNow() }}
                                </div>

                                <small>
                                    Deployed in
                                    {{
                                        deployTime(
                                            log.published_at,
                                            log.created_at
                                        )
                                    }}
                                </small>
                                <!-- {{ log.state }} -->
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DeploymentLog',
    props: {
        settings: {
            type: Object,
            default: () => {}
        }
    },
    data() {
        return {
            isLoading: false,
            logs: []
        }
    },
    created() {
        this.fetch()
    },
    methods: {
        fetch() {
            this.isLoading = true
            this.$axios
                .get(
                    `https://api.netlify.com/api/v1/sites/${this.settings.site}/deploys`,
                    {
                        headers: {
                            Authorization: `Bearer ${this.settings.token}`
                        },
                        params: {
                            per_page: 5
                        }
                    }
                )
                .then((res) => {
                    this.logs = res.data
                    console.log(`fetch - deployment log (${this.logs.length})`)

                    setTimeout(() => {
                        this.isLoading = false
                    }, 250)
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
        deployTime(start, end) {
            return moment
                .utc(moment.duration(moment(start).diff(end)).asMilliseconds())
                .format('m[m] s[s]')
        }
    }
}
</script>

<style lang="scss" scoped>
.skeleton {
    background-color: #ddd;
    animation: pulse-bg 1s infinite;
}

@keyframes pulse-bg {
    0% {
        background-color: #ddd;
    }
    50% {
        background-color: #d0d0d0;
    }
    100% {
        background-color: #ddd;
    }
}
</style>
