<script setup>
import { mdiPackageVariantClosed } from '@mdi/js'
import SectionMain from '~/components/SectionMain.vue'
import TableProducts from '~/components/TableProducts.vue'
import CardBox from '~/components/CardBox.vue'
import LayoutAuthenticated from '~/layouts/LayoutAuthenticated.vue'
import SectionTitleLineWithButton from '~/components/SectionTitleLineWithButton.vue'

defineProps({
  products: Array,
})
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton :icon="mdiPackageVariantClosed" title="Products" main>
        <!-- Add button can go here later -->
      </SectionTitleLineWithButton>

      <CardBox class="mb-6" has-table>
        <TableProducts :products="products"/>
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>
