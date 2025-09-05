<script setup>
import { mdiAccountGroup } from '@mdi/js'
import SectionMain from '~/components/SectionMain.vue'
import TableUsers from '~/components/TableUsers.vue'
import CardBox from '~/components/CardBox.vue'
import LayoutAuthenticated from '~/layouts/LayoutAuthenticated.vue'
import SectionTitleLineWithButton from '~/components/SectionTitleLineWithButton.vue'

defineProps({
  users: Array,
})
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton :icon="mdiAccountGroup" title="Users" main>
        <!-- Add button can go here later -->
      </SectionTitleLineWithButton>

      <CardBox class="mb-6" has-table>
        <TableUsers :users="users"/>
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>
