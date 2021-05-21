<form class="full-form" method="POST" action="{{route('hospital.create')}}"
      enctype="multipart/form-data">
    @csrf

    <div class="form-section">
        <input required
               type="text"
               name="name"
               value="{{old('name')}}"
               placeholder="Hospital Name"
               class="form-control mt-3 p-3 b-none b-color-cyan">
        <input required
               type="email"
               name="email"
               value="{{old('email')}}"
               class="form-control mt-3 p-3 b-none b-color-cyan"
               placeholder="Hospital Email">
        <input required
               type="text"
               name="phone"
               value="{{old('phone')}}"
               class="form-control mt-3 p-3 b-none b-color-cyan"
               placeholder="Hospital Phone">
    </div>

    <div class="form-section">
        <div class="input-group mt-4">
            <div class="input-group-prepend">
                <span class="input-group-text bg-cyan" id="basic-addon3">https://hms.com/</span>
            </div>
            <input style="border-left: 1px solid silver!important;" type="text"
                   placeholder="Domain"
                   required
                   name="domain"
                   id="domain"
                   value="{{old('domain')}}"
                   class="p-3 b-none b-color-cyan form-control"
                   aria-describedby="basic-addon3">
        </div>
        <div class="status-valid input-group-append">
            <span class="text-success">Valid</span>
        </div>
        <div class="status-invalid input-group-append">
            <span class="text-danger">Invalid</span>
        </div>
        <div class="status-check input-group-append">
            <span class="text-info">Checking....</span>
        </div>

        <textarea required
                  type="text"
                  name="description"
                  class="form-control mt-3 p-3 b-none b-color-cyan"
                  placeholder="Description"></textarea>
        <input required
               id="date"
               placeholder="Establishment Date"
               name="establishment_date"
               value="{{old('establishment_date')}}"
               class="form-control mt-3 p-3 b-none b-color-cyan"
               type="text">

        <input required
               type="text"
               name="address"
               value="{{old('address')}}"
               class="form-control mt-3 p-3 b-none b-color-cyan"
               placeholder="Address">
        <input type="file"
               name="logo"
               id="logo"
               accept="image/*"
               value="{{old('logo')}}"
               class="mt-3 f-cyan">
    </div>

    <div class="form-section">
        <input name="social[facebook]"
               type="text"
               value="{{old('social[facebook]')}}"
               placeholder="Facebook"
               class="form-control mt-3 p-3 b-none b-color-cyan">
        <input name="social[instagram]"
               type="text"
               value="{{old('social[instagram]')}}"
               class="form-control mt-3 p-3 b-none b-color-cyan"
               placeholder="Instagram">
        <input name="social[twitter]"
               type="text"
               value="{{old('social[twitter]')}}"
               placeholder="Twitter"
               class="form-control mt-3 p-3 b-none b-color-cyan">
    </div>

    <div class="form-section">
        <input name="user[name]"
               required
               type="text"
               placeholder="Name"
               value="{{old('user.name]')}}"
               class="form-control mt-3 p-3 b-none b-color-cyan">
        <input name="user[email]"
               required
               type="email"
               value="{{old('user.email]')}}"
               class="form-control mt-3 p-3 b-none b-color-cyan"
               placeholder="Email">
        <input name="user[password]"
               required
               type="password"
               placeholder="Password"
               class="form-control mt-3 p-3 b-none b-color-cyan">
        <input name="user[password_confirmation]"
               required
               type="password"
               placeholder="Confirm Password"
               class="form-control mt-3 p-3 b-none b-color-cyan">
    </div>


    <div class="form-navigator d-flex justify-content-end">
        <button type="button" class=" previous btn mt-5 mb-3 btn-grey">previous</button>
        <button type="button" class=" next btn mt-5 mb-3 btn-cyan">Next</button>
        <button type="submit" class=" btn mt-5 mb-3 btn-blue">Submit</button>
    </div>

</form>
