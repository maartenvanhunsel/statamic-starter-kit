/* eslint-disable no-undef */
import TriggerDeploy from './TriggerDeploy.vue'
import DeploymentLog from './DeploymentLog.vue'

Statamic.booting(() => {
    Statamic.$components.register('trigger-deploy', TriggerDeploy)
    Statamic.$components.register('deployment-log', DeploymentLog)
})
