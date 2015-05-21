/*-------------------------------------------------------*\
						Slider
\*-------------------------------------------------------*/
;

// Home page:
    require('../plugins/jquery.slick.js');
// Initialization
	$(document).ready(function() {

		$('#jsSlider-1').slick({
                arrows: true,
                prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="previous"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA0AAAAdCAYAAABxPebnAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAARpJREFUeNpi/P//PwMpgJGRsY2RFE1ADe1AiosBpIkQBqkH4lwgXgrmE6nJG4g3ATEbUZqAwBGIDwKxCFyMgAZNID4CxMIo4ng0CADxUSA2wpDDoUEEiPcCsQtWeRya1gJxCE5XYNEwH4gr8PkVHrnAiGMGUi1AzAIUK8UXySxI7AwgFgXidIJJA2pTDBBvgUUeEXHHYACNbRZiNMA0HQBia2I1wDQ5AfEykjRBdWYB8RqSNEE1VgPxRCBmJqSJCSkgO6F0BVFBjubJ1UCcQ5Tz0DRuBWIvUjVJQjOeOdGakDQeB2I9ojVBNepCcy4v0ZqQCpX9QMxDtCaoxnBoqHKSoglU7uUD8TyUTEhkCdsLilpGMsryPoAAAwBD49VaS2wWqwAAAABJRU5ErkJggg==" /></button>',
                nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="next"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA0AAAAdCAYAAABxPebnAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAARhJREFUeNpiYGBgmAnESv///2cgFoOAJxDvAmImojVBdSYD8QYgZiRaE1RjCRBPA2IWQpqYGBCgH4i/AnENAyGAxZNLgLiIKOehadwMxH6kahIH4v1AbE20JqhGMSA+BsT6RGuCatQB4iNAzEe0JqhGT6hT+YnWBNUYAsRrgZiDFE2MQFwIxPNBfEZYAiQGMDIyghLAA5I0QTWeItWmeiD1ixQ/pQHxKlICwhWItwExJ7HxZA2NYHFiU4QqEB8FJSli0x4fEB8GYjNiU7kwEO8FYndSssYaIA4jJrvD4mIekDoLlFyFM75gkQtUzAykGqHBWowvklmQ2GnQHJtOVMECBLHQcoGd2BLWBRpSTKQUy3NJLcsBAgwAKdbSmEpSh+IAAAAASUVORK5CYII=" /></button>',
                autoplay: true,
                autoplaySpeed: 2000,
                cssEase: 'ease',
                dots: true,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 4,
                speed: 500,
                responsive: [
                    {
                        breakpoint: 700,
                        settings: {
                            autoplay: false,
                            arrows: false,
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 550,
                        settings: {
                            autoplay: false,
                            arrows: false,
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }
                ]
		});

        $('#jsSlider-2').slick({
            arrows: true,
            prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="previous"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAABICAYAAACA/2cKAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDIxIDc5LjE1NTc3MiwgMjAxNC8wMS8xMy0xOTo0NDowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTQgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkI1RUI4QTdGRjU0RTExRTRCNkE1RDE1NDRGNkU0RUI3IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkI1RUI4QTgwRjU0RTExRTRCNkE1RDE1NDRGNkU0RUI3Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6QjVFQjhBN0RGNTRFMTFFNEI2QTVEMTU0NEY2RTRFQjciIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6QjVFQjhBN0VGNTRFMTFFNEI2QTVEMTU0NEY2RTRFQjciLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4p0KW4AAAD/0lEQVR42syaeUhUURTG34gl0SYhCQZCUEn+k6VluVVERtlmC20WZbSHVKJkQQuWZtm+GLaCpRBUVgplUJEDoaElQbSARCvVHxVFtGLfGe+D0aZ37uSbOfPBxxvf+97MzzP3vnfvnecwqmoNSbWkJbX521HtTMUmFvsL3fcHGQEkQA7C5hpcgNe5AQkKsERs6t12FWHfuoACBVACNk64c7tDu3FstSsj3UahsXANk8mTruh4DUiXggUhp8IXNXIZuAKclaroTE3IeQQpVdE5cLlGbjogL0j1+uWakOPcIf0NugQu0elggPyrg/kLdBVcqpFLBeRVTwf8AboBPsRkfsLDAXld6vK0Ht6uATkCkA1WIV9WNB8uZDJf4TgO0pcVLYazmcwn9XU/krozHYWXMZn3BAk3676p3aB7NSDfwfHwM2/e2E7QE3Amk6EKpsCvvH1zu0DLaPDAZJ7TFAP++D8fYEevr9CAbO4IpB0VpftxOpO5DyfDXzryQR0BrYYnMJm7cKK6qBsSoDVqCmGlO3CCXT3V2zbqgG9oQNbaCektKFW/Dh6t0SRS7L6LBHvxD1F7i2FyNESb6It7sk5Fu2pCVqpZpU/EVbSn+rqjmNw5eJYvx4tWFQ2D72lAVvga0go0HKYxYl/m/NPwXH/MZTyBRsKNamulY/Aif80M24P2g5vgCOa8XfBSf86z3UEHqI4TypyzD87196qFCRqjOk4vJr8VXiuwuuK6PE2DzzO5H6o9lhtCCtKoIqkFfmEIikCPw1OYXAh8G14oCUq6DI/RyJ+CV0qCGmr4pgN7GF4hCWrC0jjyF3PeEThHEtQcmcdrTB92whslQQ11Cx0Gf2PO3wZvkQQ1Z4+xGrPHzXCBJCjpIRwHv2VyeWo5RwyU9BgeDL9kcmvUNVkMlPRGdTCusosNvXV6n85CX8ND4KdMjn75KJMENWGpgz1hchlqiiIGSvpstC7CPmByszVGZT4FJX2Ah6p5lZVoCHlJEpT0XXWweiY3Gb5ltC4HiYCSfitYJ5MbqYaJYqCmklXVrERPudyEO0mCkmjx7AqTGaWaShdJULM9VjKZGNUJe0iCktI1LksDVWVDJUFJMzTuTrSm1eiodoZJgpIWGK3LPlaita0GwIZLgpJo2Yf7nT5SVbaPJCiJfnIsZjIRCra/JKihJoI7mExv1QyiJUHNWUARk+kO1wE2ShKURE9EbGIy3eAmwMZJgpLyVXWtFKIqmyQJaqj2yi0NEVstYF2/a0k/7ZgF79fIZUo/7XjA4J+YIEWLP+jakpZUqu5i/9IeZHIC4olcgNC4YL6HQwdxLFuyM3mCPYPNJLddJdiXJd3r/wVbpcYHJ/G6zVXhjwADADmN4D4Xm5NUAAAAAElFTkSuQmCC" /></button>',
            nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="next"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAABICAYAAACA/2cKAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDIxIDc5LjE1NTc3MiwgMjAxNC8wMS8xMy0xOTo0NDowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTQgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkJEQjdGNzQ1RjU0RTExRTQ4MUI4QTUyOEVFNUUxN0QzIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkJEQjdGNzQ2RjU0RTExRTQ4MUI4QTUyOEVFNUUxN0QzIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6QkRCN0Y3NDNGNTRFMTFFNDgxQjhBNTI4RUU1RTE3RDMiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6QkRCN0Y3NDRGNTRFMTFFNDgxQjhBNTI4RUU1RTE3RDMiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6tsyHJAAAD5klEQVR42syae2jNYRzG3x2jyDX/2D9CofxBjTBGW4lmLrkUc02LXOeWsEghk1so9xIiRlbYJKGZNRvbQhJZiAhtpdyJeR7nPTnW2fm+Zzvn9z1PPXVO5/n9zqf3vL/39j0JpvCWaaD58Ff4uPFA9ZmpTrnEBu8nwwfs61q4yMSJfEGvJ8Lngt4XwtPjDXQ0fD7E5yfjBZag04SfmLDz4gE0wSF3CF6iDXoKHu6Q3Quv0O6jHKOGwL+F/E54tfZTfxseBH8XrtkKr9MEpSrhfvAn4bpNFlgNlHpiW/ajcC27wBZNUOoR3B9+L1y/Ft6mCUo9hZPhN8I9VtnhSw2Uem1hXwo5TgiHNUGpd7YbPBdyc2O54vI55mptyz4WcrPg05qg1Ad4AFwt5KbClzRBqc/wUPiekBsDX9AEpb7ZcbZYyI2Db2iCUj/gdLhUyDFTogkaEFddN4XMMLgcbqEJWg+nwReFHLtKBdxKCzSg8XCBkOFYfBfuqAlKTYLzhUxf2w3aaYIGxtAzQqa3XU4maYJSWfARIdPLThxdNUEDi5SDQqYLYROKSpM0QakF8B4h09nC9tIEpZbBeQ4tWwXYPpqgVC68Uci05QMG2H6aoNQGeL2QaQ3fAWyyJii12eFMgDNXBWBTNEGN3QguEjI8Ci0DbLomKLUfXuyQuxEMqwFK7YPnOMJyEW4SQhyNe6lhduUlLVRyfEZXL+BfDrkkTdA0e17QWcgtrc9MzU1Ugsw0/hqBpGxAHtV6mDIihdQAZXnossu6NhjSa9AZ5v/yUGOaAMj8ULOAF5oJn3DIjQVkodZcP9cRMqMxSC9AWfKRjiNZ4BgByCta61EWJPYKmZ/c8wPyutYKf43xFyTCiTNSKiArtfZMWxy2HyxkDOZC2fWm0X7q82xrhhNLQ1zF12jt63c4QNbalqyJ9ObRalFui3OEzFt4IPyqKV8QDdBj8Gwh89pCvmnqlzQX9ISddaQ1J8/+65rzRb4YQz4z/uPGuub+bE1tUW4fxgqZ+xwnjVwAjhkop7pRQqbaPt0/ozWkRPrTX3OALI82ZKQtWmJ3jeHELe1wEwP5HDNlDpDFsYJ0AWWLs5qRIuSuGn9NyWiAtreLhgHCPQoc+m3M+mgn25I9hetZWMjyYi/ja6Qlyx0gz3oFGQo0yQ7U0pk6t7JTvNxnB4OylFIFdxOu4d82s70+tQiAdocfGLlIxTXnQoXTlb+gI+GHcAchu8v4/5FjtEB7wG0cthgrjaIIygpbuHN1VjRyjbICfZTn6stDfM6Sy0YTBwoe8HfDLc2/v7CxILDPxIkazkzbjb/k9yWeIKk/AgwAUBjLamT0FO0AAAAASUVORK5CYII=" /></button>',
            cssEase: 'ease',
            dots: false,
            infinite: true,
            slide: '',
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 500,
            responsive: [
                {
                    breakpoint: 800,
                    settings: {
                        dots: true,
                        arrows: false
                    }
                }
            ]
        });
	});
