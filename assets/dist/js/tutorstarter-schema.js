!function(e){var t={};function r(a){if(t[a])return t[a].exports;var l=t[a]={i:a,l:!1,exports:{}};return e[a].call(l.exports,l,l.exports,r),l.l=!0,l.exports}r.m=e,r.c=t,r.d=function(e,t,a){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:a})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var a=Object.create(null);if(r.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var l in e)r.d(a,l,function(t){return e[t]}.bind(null,l));return a},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="/",r(r.s=4)}({4:function(e,t,r){e.exports=r("EJew")},EJew:function(e,t,r){"use strict";r.r(t);var a=wp.i18n.__,l=[{label:a("--Select--","tutorstarter"),value:""},{label:a("Accounting Service","tutorstarter"),value:"AccountingService"},{label:a("Amusement Park","tutorstarter"),value:"AmusementPark"},{label:a("Animal Shelter","tutorstarter"),value:"AnimalShelter"},{label:a("Art Gallery","tutorstarter"),value:"ArtGallery"},{label:a("Automotive Business","tutorstarter"),value:"AutomotiveBusiness"},{label:a("Auto Body Shop","tutorstarter"),value:"AutoBodyShop"},{label:a("Auto Dealer","tutorstarter"),value:"AutoDealer"},{label:a("Auto Parts Store","tutorstarter"),value:"AutoPartsStore"},{label:a("Auto Rental","tutorstarter"),value:"AutoRental"},{label:a("Auto Repair","tutorstarter"),value:"AutoRepair"},{label:a("Auto Wash","tutorstarter"),value:"AutoWash"},{label:a("Bakery","tutorstarter"),value:"Bakery"},{label:a("Bar Or Pub","tutorstarter"),value:"BarOrPub"},{label:a("Beauty Salon","tutorstarter"),value:"BeautySalon"},{label:a("Cafe Or Coffee Shop","tutorstarter"),value:"CafeOrCoffeeShop"},{label:a("Casino","tutorstarter"),value:"Casino"},{label:a("Child Care","tutorstarter"),value:"ChildCare"},{label:a("Comedy Club","tutorstarter"),value:"ComedyClub"},{label:a("Day Spa","tutorstarter"),value:"DaySpa"},{label:a("Dry Cleaning Or Laundry","tutorstarter"),value:"DryCleaningOrLaundry"},{label:a("Emergency Service","tutorstarter"),value:"EmergencyService"},{label:a("Employment Agency","tutorstarter"),value:"EmploymentAgency"},{label:a("Entertainment Business","tutorstarter"),value:"EntertainmentBusiness"},{label:a("Fast Food Restaurant","tutorstarter"),value:"FastFoodRestaurant"},{label:a("Fire Station","tutorstarter"),value:"FireStation"},{label:a("Gas Station","tutorstarter"),value:"GasStation"},{label:a("Hair Salon","tutorstarter"),value:"HairSalon"},{label:a("Health And Beauty Business","tutorstarter"),value:"HealthAndBeautyBusiness"},{label:a("Health Club","tutorstarter"),value:"HealthClub"},{label:a("Hospital","tutorstarter"),value:"Hospital"},{label:a("Ice Cream Shop","tutorstarter"),value:"IceCreamShop"},{label:a("Insurance Agency","tutorstarter"),value:"InsuranceAgency"},{label:a("Motorcycle Dealer","tutorstarter"),value:"MotorcycleDealer"},{label:a("Motorcycle Repair","tutorstarter"),value:"MotorcycleRepair"},{label:a("Movie Theater","tutorstarter"),value:"MovieTheater"},{label:a("Nail Salon","tutorstarter"),value:"NailSalon"},{label:a("Night Club","tutorstarter"),value:"NightClub"},{label:a("Police Station","tutorstarter"),value:"PoliceStation"},{label:a("Restaurant","tutorstarter"),value:"Restaurant"},{label:a("Tatto Parlor","tutorstarter"),value:"TattoParlor"}],o=[{label:a("--Select--","tutorstarter"),value:""},{label:a("Organization","tutorstarter"),value:"Organization"},{label:a("Corporation","tutorstarter"),value:"Corporation"},{label:a("Educational Organization","tutorstarter"),value:"EducationalOrganization"},{label:a("Government Organization","tutorstarter"),value:"GovernmentOrganization"},{label:a("NGO","tutorstarter"),value:"NGO"},{label:a("Performing Group","tutorstarter"),value:"PerformingGroup"},{label:a("Sports Team","tutorstarter"),value:"SportsTeam"}],n=[{label:a("--Select--","tutorstarter"),value:""},{label:a("Male","tutorstarter"),value:"Male"},{label:a("Female","tutorstarter"),value:"Female"},{label:a("Other","tutorstarter"),value:"Other"}],u=[{label:a("--Select--","tutorstarter"),value:""},{label:a("Product","tutorstarter"),value:"Product"},{label:a("Book","tutorstarter"),value:"Book"}],c=wp.i18n.__,s=wp.element.Fragment,i=wp.components,m=i.SelectControl,b=i.TextControl,h=i.TextareaControl,d=function(e){var t,r=e.updatedValue,a=e.updateMeta,i=[],d=tutorstarter_admin.is_post,p=tutorstarter_admin.post_title,g=tutorstarter_admin.post_excerpt,v=tutorstarter_admin.post_content,_=tutorstarter_admin.post_thumbnail;return"1"===d?React.createElement(s,null,React.createElement(b,{label:c("Schema Type","tutorstarter"),value:"Blog Post",disabled:!0,style:{backgroundColor:"#eeeeee",cursor:"not-allowed"}}),React.createElement(b,{label:c("Title","tutorstarter"),placeholder:c("e.g: My Awesome Post","tutorstarter"),value:r.name?r.name:p,onChange:function(e){return a(e,"name")}}),React.createElement(b,{label:c("Image URL","tutorstarter"),placeholder:c("e.g: https://site.com/image-url.jpg","tutorstarter"),value:r.logo_url?r.logo_url:_,onChange:function(e){return a(e,"logo_url")}}),React.createElement(b,{label:c("Keywords","tutorstarter"),placeholder:c("e.g: seo wordpress blog","tutorstarter"),value:r.keywords,onChange:function(e){return a(e,"keywords")}}),React.createElement(h,{label:c("Description","tutorstarter"),placeholder:c("e.g: Awesome Description","tutorstarter"),value:r.description?r.description:g,onChange:function(e){return a(e,"description")}}),React.createElement(h,{label:c("Article Body","tutorstarter"),placeholder:c("e.g: Awesome Post Content","tutorstarter"),value:r.article_body?r.article_body:v,onChange:function(e){return a(e,"article_body")}})):React.createElement(s,null,React.createElement(m,{label:c("Schema Type","tutorstarter"),value:r.main_schema_select,options:[{label:c("--Select--","tutorstarter"),value:""},{label:c("Local Business","tutorstarter"),value:"LocalBusiness"},{label:c("Organization","tutorstarter"),value:"Organization"},{label:c("Web Page","tutorstarter"),value:"WebPage"},{label:c("Video","tutorstarter"),value:"Video"},{label:c("Review","tutorstarter"),value:"Review"},{label:c("Person","tutorstarter"),value:"Person"}],onChange:function(e){return a(e,"main_schema_select")}}),"WebPage"!==r.main_schema_select&&"Video"!==r.main_schema_select&&React.createElement(m,{label:"Person"===r.main_schema_select?c("Gender","tutorstarter"):c("Sub Schema Type","tutorstarter"),value:r.sub_schema_select,options:(t=r.main_schema_select,"LocalBusiness"===t?i=l:"Organization"===t?i=o:"Person"===t?i=n:"Review"===t&&(i=u),i),onChange:function(e){return a(e,"sub_schema_select")}}),React.createElement(b,{label:c("Name","tutorstarter"),placeholder:c("e.g: John Doe","tutorstarter"),value:r.name,onChange:function(e){return a(e,"name")}}),"Person"===r.main_schema_select&&React.createElement(s,null,React.createElement(b,{label:c("Job Title","tutorstarter"),placeholder:c("e.g: Software Engineer","tutorstarter"),value:r.job_title,onChange:function(e){return a(e,"job_title")}}),React.createElement(b,{label:c("Height","tutorstarter"),placeholder:c("e.g: 165 cm","tutorstarter"),value:r.height,onChange:function(e){return a(e,"height")}}),React.createElement(b,{label:c("Email","tutorstarter"),placeholder:c("e.g: john@doe.com","tutorstarter"),value:r.email,onChange:function(e){return a(e,"email")}}),React.createElement(b,{label:c("Birth Date","tutorstarter"),placeholder:c("e.g: YYYY-MM-DD","tutorstarter"),value:r.birth_date,onChange:function(e){return a(e,"birth_date")}}),React.createElement(b,{label:c("Birth Place","tutorstarter"),placeholder:c("e.g: Zurich, Switzerland","tutorstarter"),value:r.birth_place,onChange:function(e){return a(e,"birth_place")}}),React.createElement(b,{label:c("Nationality","tutorstarter"),placeholder:c("e.g: American","tutorstarter"),value:r.nationality,onChange:function(e){return a(e,"nationality")}}),React.createElement(b,{label:c("PO Box","tutorstarter"),placeholder:c("e.g: 4521","tutorstarter"),value:r.po_box,onChange:function(e){return a(e,"po_box")}})),"Person"!==r.main_schema_select&&"WebPage"!==r.main_schema_select&&React.createElement(b,{label:"Video"===r.main_schema_select?c("Thumbnail URL","tutorstarter"):c("Logo/Image URL","tutorstarter"),placeholder:c("e.g: https://site.com/image-url.jpg","tutorstarter"),value:r.logo_url,onChange:function(e){return a(e,"logo_url")}}),"Person"!==r.main_schema_select&&React.createElement(h,{label:c("Description","tutorstarter"),placeholder:c("e.g: Awesome description","tutorstarter"),value:r.description,onChange:function(e){return a(e,"description")}}),"Organization"===r.main_schema_select&&React.createElement(b,{label:c("PO Box","tutorstarter"),placeholder:c("e.g: 4521","tutorstarter"),value:r.po_box,onChange:function(e){return a(e,"po_box")}}),"WebPage"!==r.main_schema_select&&"Video"!==r.main_schema_select&&"Review"!==r.main_schema_select&&React.createElement(s,null,React.createElement(b,{label:c("Address","tutorstarter"),placeholder:c("e.g: 45, johnson road","tutorstarter"),value:r.address,onChange:function(e){return a(e,"address")}}),React.createElement(b,{label:c("Phone Number","tutorstarter"),placeholder:c("e.g: +1 22 33 4567","tutorstarter"),value:r.phone,onChange:function(e){return a(e,"phone")}}),React.createElement(b,{label:c("City","tutorstarter"),placeholder:c("e.g: New York","tutorstarter"),value:r.city,onChange:function(e){return a(e,"city")}}),React.createElement(b,{label:c("State/Region","tutorstarter"),placeholder:c("e.g: California(CA)","tutorstarter"),value:r.state_region,onChange:function(e){return a(e,"state_region")}}),React.createElement(b,{label:c("Zip/Postal Code","tutorstarter"),placeholder:c("e.g: 1234","tutorstarter"),value:r.zip_code,onChange:function(e){return a(e,"zip_code")}}),React.createElement(b,{label:c("Country","tutorstarter"),placeholder:c("e.g: USA","tutorstarter"),value:r.country,onChange:function(e){return a(e,"country")}})),"Video"===r.main_schema_select&&React.createElement(s,null,React.createElement(b,{label:c("Upload Date","tutorstarter"),help:c('Format it like this YYYY-MM-DD and the time with "T then hour:minute:second+timezone"',"tutorstarter"),placeholder:c("e.g: 2020-10-10T08:00:00+08:00","tutorstarter"),value:r.upload_date,onChange:function(e){return a(e,"upload_date")}}),React.createElement(b,{label:c("Duration","tutorstarter"),help:c("Format it like this: PT then 1 minute and then 30 second","tutorstarter"),placeholder:c("e.g: PT1M30S","tutorstarter"),value:r.duration,onChange:function(e){return a(e,"duration")}}),React.createElement(b,{label:c("Content URL","tutorstarter"),placeholder:c("e.g: https://example.com/video-url.mp4","tutorstarter"),value:r.content_url,onChange:function(e){return a(e,"content_url")}}),React.createElement(b,{label:c("Embed URL","tutorstarter"),placeholder:c("e.g: https://example.com/videoplayer.swf?video=123","tutorstarter"),value:r.embed_url,onChange:function(e){return a(e,"embed_url")}}),React.createElement(b,{label:c("Interaction Count","tutorstarter"),placeholder:c("e.g: 1254","tutorstarter"),value:r.interaction_count,onChange:function(e){return a(e,"interaction_count")}})),"Review"===r.main_schema_select&&React.createElement(s,null,React.createElement(b,{label:c("Rating Value","tutorstarter"),placeholder:c("e.g: 4","tutorstarter"),value:r.rating_value,onChange:function(e){return a(e,"rating_value")}}),React.createElement(b,{label:c("Reviewed Item","tutorstarter"),placeholder:c("e.g: iPhone 11 Pro Case","tutorstarter"),value:r.reviewed_product,onChange:function(e){return a(e,"reviewed_product")}}),React.createElement(b,{label:c("Reviewed By","tutorstarter"),placeholder:c("e.g: Mr John Doe","tutorstarter"),value:r.reviewed_by,onChange:function(e){return a(e,"reviewed_by")}}),React.createElement(b,{label:c("Date Published","tutorstarter"),help:c("Format it like this YYYY-MM-DD","tutorstarter"),placeholder:c("e.g: 2020-10-10","tutorstarter"),value:r.date_published,onChange:function(e){return a(e,"date_published")}}),React.createElement(b,{label:c("Review Publisher Type","tutorstarter"),placeholder:c("e.g: Organization","tutorstarter"),value:r.publisher_type,onChange:function(e){return a(e,"publisher_type")}}),React.createElement(b,{label:c("Publisher Name","tutorstarter"),placeholder:c("e.g: iPhone 11 Pro Case Inc.","tutorstarter"),value:r.publisher_name,onChange:function(e){return a(e,"publisher_name")}})))};function p(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);t&&(a=a.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,a)}return r}function g(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var v=wp.compose.compose,_=wp.editPost.PluginDocumentSettingPanel,f=wp.data,y=f.select,C=f.withSelect,R=f.withDispatch,P=v([C((function(){return{updatedValue:y("core/editor").getEditedPostAttribute("meta")._tutorstarter_schema_metadata}})),R((function(e){return{updateMeta:function(t,r){var a=y("core/editor").getEditedPostAttribute("meta")._tutorstarter_schema_metadata;(a=function(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?p(Object(r),!0).forEach((function(t){g(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):p(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}({main_schema_select:"",sub_schema_select:"",name:"",logo_url:"",description:"",address:"",phone:"",city:"",state_region:"",zip_code:"",country:"",po_box:"",job_title:"",height:"",birth_date:"",birth_place:"",nationality:"",duration:"",upload_date:"",content_url:"",embed_url:"",interaction_count:"",rating_value:"",reviewed_product:"",reviewed_by:"",date_published:"",publisher_type:"",publisher_name:"",keywords:"",article_body:""},a))[r]=t,e("core/editor").editPost({meta:{_tutorstarter_schema_metadata:a}})}}}))])(d),E=function(){return React.createElement(_,{name:"tutorstarter-schema-panel",title:"Tutor Starter Schema Settings"},React.createElement(P,null))};(0,wp.plugins.registerPlugin)("tutorstarter-schema-panel",{render:E,icon:""})}});