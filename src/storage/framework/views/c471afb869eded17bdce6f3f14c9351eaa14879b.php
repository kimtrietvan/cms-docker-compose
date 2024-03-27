<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label" for="name"><?php echo e(translate('Name')); ?></label>
        <div class="col-sm-10">
            <input type="text" placeholder="<?php echo e(translate('Name')); ?>" id="name" name="name" class="form-control" required>
        </div>
    </div>
</div>
<div class="form-group">
    <div class=" row">
        <label class="col-sm-2 control-label" for="email"><?php echo e(translate('Email')); ?></label>
        <div class="col-sm-10">
            <input type="email" placeholder="<?php echo e(translate('Email')); ?>" id="email" name="email" class="form-control" required>
        </div>
    </div>
</div>
<div class="form-group">
    <div class=" row">
        <label class="col-sm-2 control-label" for="address"><?php echo e(translate('Address')); ?></label>
        <div class="col-sm-10">
            <textarea placeholder="<?php echo e(translate('Address')); ?>" id="address" name="address" class="form-control" required></textarea>
        </div>
    </div>
</div>
<div class="form-group">
    <div class=" row">
        <label class="col-sm-2 control-label"><?php echo e(translate('Country')); ?></label>
        <div class="col-sm-10">
            <select class="form-control aiz-selectpicker" data-live-search="true" data-placeholder="<?php echo e(translate('Select your country')); ?>" name="country_id" required>
                <option value=""><?php echo e(translate('Select your country')); ?></option>
                <?php $__currentLoopData = \App\Models\Country::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-2 control-label">
            <label><?php echo e(translate('State')); ?></label>
        </div>
        <div class="col-sm-10">
            <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="state_id" required>

            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-2">
            <label><?php echo e(translate('City')); ?></label>
        </div>
        <div class="col-sm-10">
            <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="city_id" required>

            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <div class=" row">
        <label class="col-sm-2 control-label" for="postal_code"><?php echo e(translate('Postal code')); ?></label>
        <div class="col-sm-10">
            <input type="number" min="0" placeholder="<?php echo e(translate('Postal code')); ?>" id="postal_code" name="postal_code" class="form-control" required>
        </div>
    </div>
</div>
<div class="form-group">
    <div class=" row">
        <label class="col-sm-2 control-label" for="phone"><?php echo e(translate('Phone')); ?></label>
        <div class="col-sm-10">
            <input type="number" min="0" placeholder="<?php echo e(translate('Phone')); ?>" id="phone" name="phone" class="form-control" required>
        </div>
    </div>
</div><?php /**PATH /Users/truongdinh/code/php/Demo/resources/views/backend/pos/guest_shipping_address.blade.php ENDPATH**/ ?>