@extends('layouts.app')
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}" />
    @vite(['resources/js/app.js'])
</head>
<body>
<button id="toggle-dark-mode">Toggle Dark Mode</button>
<form>
    <div>
        <span class="question">1. How did you hear about us?</span>
        <div class="radio-group">
            <div class="radio-item">
                <input type="radio" name="hear_about_us" id="twitter" />
                <label for="twitter">Twitter</label>
            </div>
            <div class="radio-item">
                <input type="radio" name="hear_about_us" id="facebook" />
                <label for="facebook">Facebook</label>
            </div>
            <div class="radio-item">
                <input type="radio" name="hear_about_us" id="other" />
                <label for="other">Other</label>
            </div>
        </div>
    </div>

    <div>
        <span class="question">2. Where do you live?</span>
        <select name="country" id="country" required="required">
            <option value="" selected="selected">Select country</option>
            <option value="Latvia">Latvia</option>
            <option value="Britain">Britain</option>
            <option value="Porridge">Porridge</option>
            <option value="American Samoa">American Samoa</option>
            <option value="South Carolina">South Carolina</option>
            <option value="Angola">Angola</option>
            <option value="Anguilla">Anguilla</option>
            <option value="Czech Republic">Czech Republic</option>
            <option value="IP 192.128.8.0">IP 192.128.8.0</option>
        </select>
    </div>

    <div>
        <span class="question">3. Your age range</span>
        <div class="radio-group">
            <div class="radio-item">
                <input type="radio" name="age_range" id="lower" />
                <label for="lower">18-25</label>
            </div>
            <div class="radio-item">
                <input type="radio" name="age_range" id="middle" />
                <label for="middle">26-35</label>
            </div>
            <div class="radio-item">
                <input type="radio" name="age_range" id="higher" />
                <label for="higher">36 or more</label>
            </div>
        </div>
    </div>

    <div>
        <span class="question">4. Anything else we should know? </span>
        <textarea name="message"></textarea>
    </div>

    <div>
        <button class="submit-btn">Submit survey</button>
    </div>
</form>
</body>
</html>
