<script setup>
import {
  mdiAccountMultiple,
  mdiCartOutline,
  mdiChartTimelineVariant,
  mdiMonitorCellphone,
  mdiGithub,
  mdiChartPie,
  mdiPackageVariantClosed, // Added icon for products sold
} from '@mdi/js'
import LineChart from '~/components/Charts/LineChart.vue'
import SectionMain from '~/components/SectionMain.vue'
import CardBoxWidget from '~/components/CardBoxWidget.vue'
import CardBox from '~/components/CardBox.vue'
import TableUsers from '~/components/TableUsers.vue'
import NotificationBar from '~/components/NotificationBar.vue'
import BaseButton from '~/components/BaseButton.vue'
import CardBoxTransaction from '~/components/CardBoxTransaction.vue'
import CardBoxClient from '~/components/CardBoxClient.vue'
import LayoutAuthenticated from '~/layouts/LayoutAuthenticated.vue'
import SectionTitleLineWithButton from '~/components/SectionTitleLineWithButton.vue'
import SectionBannerStarOnGitHub from '~/components/SectionBannerStarOnGitHub.vue'

defineProps({
  users: Array,
  totalSales: Number,
  latestTransactions: Array,
  latestUsers: Array,
  salesChartData: Object,
  totalProductsSold: Number,
})
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton :icon="mdiChartTimelineVariant" title="Overview" main>
        <BaseButton
          href="https://github.com/justboil/admin-one-vue-tailwind"
          target="_blank"
          :icon="mdiGithub"
          label="Star on GitHub"
          color="contrast"
          rounded-full
          small
        />
      </SectionTitleLineWithButton>

      <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 mb-6">
        <CardBoxWidget
          trend-type="up"
          color="text-emerald-500"
          :icon="mdiAccountMultiple"
          :number="users.length"
          label="Users"
        />
        <CardBoxWidget
          trend-type="down"
          color="text-blue-500"
          :icon="mdiCartOutline"
          :number="totalSales"
          prefix="Rp "
          label="Sales"
        />
        <CardBoxWidget
          color="text-red-500"
          :icon="mdiPackageVariantClosed"
          :number="totalProductsSold"
          label="Products Sold"
        />
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="flex flex-col justify-between">
          <CardBoxTransaction
            v-for="transaction in latestTransactions"
            :key="transaction.id"
            :amount="transaction.amount"
            :date="transaction.created_at"
            :business="transaction.type"
            :type="transaction.status === 'paid' ? 'up' : 'down'"
            :name="'Payment #' + transaction.id"
            :account="'Order #' + transaction.order_id"
          />
        </div>
        <div class="flex flex-col justify-between">
          <CardBoxClient
            v-for="user in latestUsers"
            :key="user.id"
            :name="user.name"
            :login="user.email"
            :date="user.created_at"
          />
        </div>
      </div>


      <SectionTitleLineWithButton :icon="mdiChartPie" title="Sales Trend (Last 30 Days)" />

      <CardBox class="mb-6">
        <div v-if="salesChartData">
          <line-chart :data="salesChartData" class="h-96" />
        </div>
      </CardBox>

      <SectionTitleLineWithButton :icon="mdiAccountMultiple" title="All Users" />

      <NotificationBar color="info" :icon="mdiMonitorCellphone">
        <b>Responsive table.</b> Collapses on mobile
      </NotificationBar>

      <CardBox has-table>
        <TableUsers :users="users"/>
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>
