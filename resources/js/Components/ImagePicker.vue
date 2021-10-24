 <template>
  <div class="fullwidth">

    <img id="img_output" v-bind:src="path">

    <div class="mt">

      <div class="btn success sm mr file" :class="componentClasses">

        <input type="file" name="uploaded_file" accept="image/*" @change="onChange" />

        <svg class="icon">
          <use xlink:href="/svg/naykel-ui-SVG-sprite.svg#upload"></use>
        </svg>

        <span>Select Image</span>

      </div>

      <button v-on:click="clear" class="btn danger sm outline" disabled>Clear Image</button>
    </div>

  </div>
</template>

<script>
export default {
  props: ["classes", "imagePath"],
  data() {
    return {
      componentClasses: this.classes,
      path: this.imagePath,
    };
  },
  methods: {
    onChange(e) {
      if (!e.target.files.length) return;

      let file = e.target.files[0];
      let reader = new FileReader();
      reader.readAsDataURL(file);
      // once the file has loaded (could be a large file)
      reader.onload = (e) => {
        // data source of the image
        let src = e.target.result;
        // preview the image using the data source
        let image = document.getElementById("img_output");
        image.src = src;
      };
    },
    clear() {
      // need to figure out how to set uploaded_file = null
      let currentImg = document.getElementById("img_output");
      // clear the preview window
      currentImg.src = "/svg/placeholder.svg";

      let z = document.getElementById("uploaded_file");
      // clear the preview window
      z.src = "/svg/placeholder.svg";

      // set img_out = null
      // document.getElementById("uploaded_file").src = "";

      // if (file.files.length == 0) {
      //   console.log("no file");
      // } else {
      //   console.log("has file");
      // }
    },
  },
};
</script>

