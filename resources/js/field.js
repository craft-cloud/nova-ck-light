import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-nova-ck-light', IndexField)
  app.component('detail-nova-ck-light', DetailField)
  app.component('form-nova-ck-light', FormField)
})
