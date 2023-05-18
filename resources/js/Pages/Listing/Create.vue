<script setup>
import {useForm} from '@inertiajs/inertia-vue3'

const form = useForm({
  property_name: null,
  year_built: 0,
  postal_code: null,
  prefecture: null,
  city: null,
  address1: null,
  nearest_station: null,
  specific_floor: null,
  rent: 0,
  administration_fee: 0,
  security_deposit: 0,
  gratuity_fee: 0,
  floor_plan: null,
  exclusive_area: 0.00,
});


const create = () => form.post('/listing')
</script>

<template>
  <form @submit.prevent="create">
    <div>
      <div>
        <label>物件名</label>
        <input v-model="form.property_name" type="text" placeholder="物件名を入力" />
      </div>

      <div>
        <label>築年数</label>
        <input v-model.number="form.year_built" type="text" placeholder="築年数を入力" />
      </div>

      <div>
        <label>郵便番号</label>
        <input v-model="form.postal_code" type="text" placeholder="郵便番号を入力" />
      </div>

      <div>
        <label>都道府県</label>
        <input v-model="form.prefecture" type="text" placeholder="都道府県を入力" />
      </div>

      <div>
        <label>市区町村</label>
        <input v-model="form.city" type="text" placeholder="市区町村を入力" />
      </div>

      <div>
        <label>市区町村以下</label>
        <input v-model="form.address1" type="text" placeholder="市区町村以下を入力" />
      </div>

      <div>
        <label>最寄駅</label>
        <input v-model="form.nearest_station" type="text" placeholder="最寄駅を入力" />
      </div>

      <div>
        <label>階</label>
        <input v-model.number="form.specific_floor" type="text" placeholder="階を入力" />
      </div>

      <div>
        <label>賃料</label>
        <input v-model.number="form.rent" type="text" placeholder="賃料を入力" />
      </div>

      <div>
        <label>管理費</label>
        <input v-model.number="form.administration_fee" type="text" placeholder="管理費を入力" />
      </div>

      <div>
        <label>敷金</label>
        <input v-model.number="form.security_deposit" type="text" placeholder="敷金を入力" />
      </div>

      <div>
        <label>礼金</label>
        <input v-model.number="form.gratuity_fee" type="text" placeholder="礼金を入力" />
      </div>

      <div>
        <label>間取り</label>
        <select v-model="form.floor_plan">
          <option value="">間取りを選択</option>
          <option value="1R">1R</option>
          <option value="1K">1K</option>
          <option value="1DK">1DK</option>
          <option value="1LDK">1LDK</option>
          <option value="2K">2K</option>
          <option value="2DK">2DK</option>
          <option value="2LDK">2LDK</option>
          <option value="3DK">3DK</option>
          <option value="3LDK">3LDK</option>
          <option value="4DK">4DK</option>
          <option value="4LDK">4LDK</option>
        </select>
      </div>

      <div>
        <label>専有面積</label>
        <input v-model.number="form.exclusive_area" type="text" placeholder="専有面積を入力" />
      </div>

      <div>
        <button type="submit">登録</button>
      </div>
    </div>
  </form>
</template>


<style scoped>
label {
  margin-right: 2em;
}

div {
  padding: 2px
}
</style>