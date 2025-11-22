(function(global){
    'use strict';

    function to_price(input){
        input = input.to_persian().replace('،', '');
        if(input.length > 3){
            let reversed_result = input.split('').reverse().join('');
            let separated_result = reversed_result.match(/.{1,3}/g);
            return separated_result.join('،').split('').reverse().join('');
        }
        return input;
    };

    //convert numbers to persian numbers
    function to_persian(input){
        let persian_numbers = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        let result = input.replace(/\d/g, num => persian_numbers[num])
        return result;
    };

    if(!String.prototype.to_persian){
        Object.defineProperty(String.prototype, 'to_persian', {'value': function(){return to_persian(this);}});
    }

    if(!Number.prototype.to_persian){
        Object.defineProperty(Number.prototype, 'to_persian', {'value': function(){return to_persian(String(this));}});
    }

    if(!Number.prototype.to_price){
        Object.defineProperty(Number.prototype, 'to_price', {'value': function(){return to_price(String(this));}});
    }

    if(!String.prototype.to_price){
        Object.defineProperty(String.prototype, 'to_price', {'value': function(){return to_price(this);}});
    }
})(window);