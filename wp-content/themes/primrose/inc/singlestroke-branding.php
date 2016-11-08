<?php
/**
 * SingleStroke branding.
 *
 * @package SingleStroke
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add a footer banner on Customizer screen.
 */
function singlestroke_customizer_banner() {
	if ( is_child_theme() ) {
		$child_data = wp_get_theme();
		$theme_data = wp_get_theme( $child_data->get( 'Template' ) );
	} else {
		$theme_data = wp_get_theme();
	}

	?>
	<div id="singlestroke-customizer-banner-box">
		<a id="singlestroke-customizer-banner-link" href="<?php echo $theme_data->get( 'AuthorURI' ); ?>" target="_blank">
			<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASsAAAAtCAIAAAB56NpKAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2ZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo4RTBDQjRGMzQ4M0VFNTExQUJFNUY2QjUxQkIwRjQzRCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo0MDEwQTZCOUYxQUUxMUU1OEFERkI1NDQ5NkQ5MDA1RiIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo0MDEwQTZCOEYxQUUxMUU1OEFERkI1NDQ5NkQ5MDA1RiIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChXaW5kb3dzKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkE1MTdBMDBBOUNGMUU1MTFBNUREQzc2RjMzNkNGMEQ0IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjhFMENCNEYzNDgzRUU1MTFBQkU1RjZCNTFCQjBGNDNEIi8+IDwvcmRmOkRlc2NyaXB0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WMiv43tRgK0rIaWMryys0TiIoxHJbyUk0LqYe3pfikPC9NfKtmKgJ2UnOhVZZCQwE8rS/snBJF5VVoBia8aNGhXE/fznPx8QeO+99950000Grvr1iiuuAM6cddZZRxxxREriFlUm6E0Dz8fo0aNPP/10Tq688sp99tnH02X9n8krY8aM2XHHHTfccMPhw4fz0+zZsy+77DLGwImM1XXXXXePPfY47LDDGLZdMppMyFq+riFDhnBC/+LwTJAQnnze8553/vnni6Vf9rKXWYvSxnGI9LJKLOpE/IaGTxNXQjP9WI7sl0iD+Pyhhx5itEXN5oQ8YZfpsoMaczraVpxdqbVab03hYRv6KfyKWE1kax+DhWJmbNrAULN0JGbgzimjph47FU3cGhI9bLrppm95y1s22mijpz3taert5ptvnjRp0iWXXKKRTJw4UdbEa1/72swIa4VRuumhe/WfcX+u77fffho5ahDVOnny5DbJRo0PPPBAVFM+ghFuueWWI0aM2G233SRc9t57b0bOaLfffvuUaBA0Y0YBQNxiNn21kvCgR8PSjv1yy/33368xg3jlgoJ1TQ/G5BlINLhQyzTIk34y0GJ7++G+I21dvRoTyInQ6ZLoiSlJxoV8y6S0Xu+uf9Jwis+0HNKh5w/W8qcd6HZymKOcqubGTqfScxHP+qIlds/5yJEjDz300PXWW6+8O2rq2GOP3WuvvVA4e+65J4yn69OmTZPazH7Su8gjZM7xL891nrSJdaWVVkLJcD5lypRnP/vZMP+pp56ac+sxfPSjHxX7zZkzB3x41VVX3X333dyy6667ohhXXHHFP//5z8997nNhP+lGHvGCF7xg1VVX5aXAq+hznsXFCy+88MQTT5Q2kz2ck8+/L3rRi8aOHctTpk6dSm+zZs3KqEx6v9O6S4PNctDOp9SHyXWZXN7Tz+lblu87GMySm5WWvgrzjCMEbcvED/7bpsiktzqz3pxrVoLOzsloVW7xp6eXz9EFk0I6WnXytre9bdy4cdnnLbfc8utf//quu+6CvjfffPMTTjjh3HPPBf7BeJttthkNzj777BIMTLGSKeBOkiwxiW233VY3/vznP0fFTZ8+PUG4iXuttdbaZZdduHj77bej7u655x4/EQ781a9+dd9998F+9KCLMNull14KkG6/4wc/+MFf/OIX/Kp5Ng73W+y///78/drXvsab/uAHP4AV7YtKo06uGt2IcMlYkQVfyUBKH4Ht1fROO610hRVWkCtYFrs613qLdvnIEsSBzngs6w88uUniCaV6JvI73mX7viT+p2fFPo82rTH9b/7JfRpwOnpmkybFwfjx47feems3Q1F861vfuvbaaz2eo446CnwIOkU/0Dm8BzPMnDmzmJptClsGvgougHDf+ta3cvK9730PnnnOc55z2mmn+R0z62CnnXbSOD/xiU8k+yEIUFlw4Le//W2MN1+Xlcjxt7/9DeZ88MEH0R7QNG/NT1tsscXll1+ei078LNQmYPjOO+9Ec66yyioHHXSQUyByAUTJFHWirJG8Ha02NzJ91DOTGTyWoc4Tnjt3rqSnaQyznLu43uYYLxHxwIyrDsRpGRssMCP9/plC2eYr2fDLLDb7teV/tx2VQadicNrAMyfY7ZlLeKAzsx9Mxb833HBDN3/FhjqBWzDSMKXQOWiG7bbbTj0A84B/adKkL96BbG5U3iOWGwSkbjfeeGMUF7fcdtttBxxwwHXXXUdXmbRg3w8Ykit/+tOfsEjziwBE+bvuuuvmxeOPP/6iiy7icdAx7MeJs8w0Qlirm79QMPmcvx/+8IdF6Fv3HTan0xusyTTCbNVR5og64KG/mc+UWRaZk8RUq3/F5UsoKw3jJ+LOWGziEBkJaNNfSvSv4JBsUBaqFSgr71wmTPGv0kczIS5zA7zOLb0gXaxdsibUdcywt7/97boOa4FFf/nLX5bEN+tVaPcjH/nI+eefj+bhImrnvPPOmzhxIopFgwEiose22morPZ1+AJAoKG7B+kLLfeADHwDKrr322tz+pje9SXbdDjvsALfss88+GpVeIR3Iztcp84OWPuaYYw4++GA0tkAaaBYA+frXvx4TEW0pkMn1YcOGKeeBnu+//34e95KXvMS5ddJao0aNeuMb3yg/MIIGJc+LvO997wMTzus7GMmb3/xmZoDeUjJaqtLm4YcfNlZKE0NsabbRG9kpoDFYx/KvkG36IMpamSVRB6ZELJKsdRCXsGwaeInE0onvCJJvtDTN5JvWypeucARZHKv0rjZzrQjUww47TB2efvrpRx99dC5yLWEYOH/SpEl2QjISCJTzl7/85egozMUJEybISXP44Yf/4Q9/wIZcc801v/71r2vMG2644RlnnAGBwhsYbPCqYoBD+w7gJYxxyCGHQNxTp0694oorMu8HnMntq6222ogRI+64445MXsGiw7ST55Prhx566M4777zvvvvyKzoWfcvJN77xDXh+9913v+aaa8ThU6ZMAXDeeOONKOczzzwTpuV2pIPejtt/9rOfMfIxY8bwL8oQtMxkfupTn3rHO97BlW222QZg/NBDD3mKrPHsRrKYy5iK2ktYlFylYsUUF2Am9z2ZlfVLD2r2yyyQ1vtSQs9dJBBnWlPyquNC+niZCZmxhISyuWw0Y9wZPDTyzOWkqSfTfQcO5Mp/9h3FhZDJACgNqFb4DTQIgXL9Xe96l5545ZVXQt+wH3aXrsBODAC9p1FB+lA5ygT2419Y8elPf7o9JXDsD3/4w5NPPhltvOmmm37hC1/YYIMN0st11llnSejsueeenlvYAAPyggsu4C69129/+1tMOLlMaSCPKKoVdQfX7bfffpoo5AjsR5t11lkH2QHz85frWLlcPPLII3/0ox/NmDEDjQ0P//73v0fhcyOiSuzHwU9woNnGsYfklqxP4eBt5ga2cfl0XCVWMh9Kxz4Zd+giyoGgqfviQAT6J0hHF++9916slNe97nVcXH311bE07uw7OHnpS18qBoAugSi6cezYsYA6GnAXbWSriGr5qFCS6Pvyyy/nCt+JPv/4xz/O7DtocOutt+oDQBAYPzf1HWeffTbElCzqD4neAIBd23cg8p/1rGeBqcB+6Ae+K+R+zjnngNaSYkQK0L0ubrLJJq9+9avpH/KyC0FyAQVy2WWX0aFeDQLlJzCkWAg2e+ELXwhsO+GEE9TgqquuAsK9+93vXnHFFWVbguWOPfZYvRTH97//feE9Dgb23e9+d9ttt0WX8i+QldfXNNoDzBwymVzZcsstR48eDVRmSuFb1DJ6+7Of/axsPLQWw1YYk/ZwHa///ve/Xw/iKfzdY489YG9/35/85CezZs1af/31YUIexPdi0mBsFPhmm22G6QttAJtRg8Lq6HYEBCcMMt3XGW3vYhFT5ipZWEs+2gebHJUWfibownioXGTKk4wHLtI6cLvttoNiIMR9+w5f/8xnPoPkxtRBA0CITJBIeZW+gyvvec97iqHIyUknnYRBhYaBoNUmFSAwDFpPlaWvSDM++Rp9h0UgVILMhvKuv/76yZMnP/OZz9QHtrGkJ44fP3699dbDUEFmb7TRRvDAF7/4RUh55MiRcuVDsiWgwgH/YMuNGzfu85//PO3hXmj3uuuu++Y3v4kygZNRNXAFV0TBwqueBMhXgO2Tn/wkbKAV38cddxx/UT5qrxPmYdVVVxV/cju4kXNE2xFHHAEngx6l61DFDPjHP/5xZv/wE4+TguXp6FsA5Ic+9KHNN98cdfqqV71KaSgXX3wxDRRRRGrASPCbhQLyi4u+wsFL0RVkveOOOx511FFcAe5yO+SOvOClECvMOefMD7/CA8wGHx0kjOAoGRTpJC8hX8syI9VMFu9ZdEPXlbXDCLGWZRku/vFAdAgyD1NeZMTxH30HJx//+MdlMMBayOxjjjlGdA/iKogU9IJOg0Ssx9KEQ9dh5yC5+Zxd/yWefHW1QdnSzGmE6ufLX/4ytPLiF78YjFRWSIlGxRXIb7iIe6dNm4ZAwXqBIRHnzn4uSwERMfDYSiutBCesvPLK8Ili2Qf2HbQBgJ3VdwiCQn+Qpkq8gRGgXQiXZ4FF5Z9EXfN26n/69OnoDZ746U9/GpXFlY997GOMAYHCuTgN2SetwkQxA/fccw9AMVPw+PWggw5yWj9i4qtf/aquI+OYbU5OO+00ETds+Zvf/AbG5hZeSpwDp/HQiRMnqgcmig8HrkGpDu87NBVMO4O8+uqr6Z8r9INMRPupH1gdxQ5mAW87ySHzOZlAppqp44kwvLVZ1uDRjV5L0SZgGH4LdsqHvOA0ycXcEwP9oRzSOD7++OPRG0JK2B786jymrv8KHYgD4ta/fBj/BIGCduT7TjN95513RuN1TWmQXBHnz1bWvzPO73znO6hrECk0jcoSzaHNoAZkebv+QAcfGFJLKuHAZgMh8+/cuXPhPQhdthMyiNv33ntvWT4wEjoBRAoQFU+iMXhTg8yvfOUrNENqyO+CdKArZky/oj95riA6qAFZQMs3vOENgspy6gKhwbeMZ6+99lLmGnoMuxHGFnJRV7w7jTHV6AEm/Otf/4oC10/IIDo85JBDkC/8O7XveMUrXkEzzE44H7GiDDvJCOFhpCTamz71mfbff38gBsoQaKA8NQMQxgl6glF32203TYI6OeCAAxz16ekI0L1ZZiZTyfkuqP2BKlY4yfbxMOH/LlJZ9PkNow6LXKZOETaeR3TRmDFj+CQY8RCTZHA2hnahD/Qk+BOCo1lxcAHeIAs0DJCyxLLbAKNZlA/84IMPonBKlN/oxe5WhLEELcPgFhBpSYkua8yyoBDnsBOvAE1DRkOGDNlhhx2UqsZPcCOc4Ht5O2AhD5I8Ar8BIoCUSG6pNfAC9pgwnsTQ5z73OQuUn/70p4yER3AOvW611VagaOjbWJ1Z4hxczV2wK8AEUw0qBzOLWLEJJQfRvViAdIL+pAe4C9wrRuIr8Ar2o8heRUMCTS0j9JOC4PAnvMcb8WjU47Bhw/7yl7+gAJE+cCOyzH5O6S7kERKBaWFgDAODXF+/uPGcs5bVq9qaCQYpJQaTK6FzDffjjKL9ow7losx7KA3MkksvvRQV96UvfcmrUZCdd88/ZM7xRXXxrrvuQnZiX7XrA4GgcKa8NTIUy3oldB1PkVHni+CrmTNn3tp3gGP1E98eCrv55psxHYF/IJz0Xzt9BKiMYQPqQ8+ceeaZJcC4zPxDwjXFsJ0u+hddN2XKFNAgSlWMx1MUE4d2FdPzvZCsuEvpnZheqAjaoFRlVtHz0Ucfveaaa+oWxAEoFPApfQigpcEDDzygjDNAIOpII0cK0BWKBXYC38J7KiagrDGsZWldibCLLrqInxg2wPLkk0/mXbbYYgs9EcZAjiAUBJJhD74IjXkLHseE/+53v8PokEdXflQgKCK4m79mghOQBcqWyYfTZI+JSbgRUSXJCOfTho8OkAHc8tbJTq5GmfwjNkvJaAaTfPHSbUUyRZPyqRa/wz9NJvlHcsWivzpJTo6M0nSxqKenuVzyM7teFWLSdZkQouS1ZYftGihHRIpTO+34LB6ROTouRJt1uEVJub6bv6eeeuo666wD1fIvRAn8Q4GMGjUKeAmgxRCCapEOCv3BGEolQ37BpdiuI0eOpA0WnTzM6DdU0y233AITzp49+zWveQ2PQJHy6ymnnIKw23777eWGQUfBt3rHtddeW0uWaHPiiSfCZpA+v9IzF7HAsW8ZDOYueknZnnSIWITxlLYGT2K8gVBgSPQwVijMyb8IESDMTjvthLZkPMBaJIL8pQhKRMY1fccuu+yi+eFNsTh4L5SzAuXiEPAqwwDEcuOECRNQpOJMcY7wsyO6abFnRbxSWLHrX4ouc0eLkiwrNh3x7wk+++HeQZH1kitczVTpU27rjpV3LrzXpqS1lQvKWsEUnCWa16aqlDSaNqCUi+tdfzbfLoHQOeecg7YBg5177rmwn8Ak0OCmm26CAW688UYAIdTPdWwtKE8CRZoQRoXKb7jhBjiHf7GO0CFnnHGG0N2FF16oR8gOxKJDZ8J+WMXTpk0D9AIctt56a6xBsZ/ACO0B7bA0Sg/NjNkpBbv++ut75Su3wH5Y40qRcwLQiBEjZsyYAaMiIET3sBmDh/1Qv8KlyBelocOovAvoFH3OMBAZBx98MPqQwcsJpGUlcuTCpbAfRj5Kb/LkyYIVWc6861WwK0NBJZHQCev+6CoA9Xji7y4ovHT/Iz15/3jQIq4D29STNsG6Z/uBGnSxDEwpttlhlpdNHnAlEjtOsjekb0kJcAg4K1v2rF+YuYXpd5E/QOtK6W333Xd37BstB4Vp5Og9AKR8dJDp7X2HQdFaa62F1YTdpRvRYxjVKD04R4F4NA9wWr4fSBw9g5IE6woWjhs3TiEKeVBhP6yprKKLostYAroXhYZmlh2OIgKFWsSMHTsWvbfaaqtdfPHF8JsEKFwqrgOlgxK12A/mHD16tF9TJqLYEi6FCfmL7JCnmk4AmUwyaBbZgWySLJPNlt83E+it0Ep9vZK2njxJh1pCVSpTdf1LJxZCTV9d1i9fdDmwAMssidX1WtnQ+jDK0r5M9kunZdZ4TV4tWUhZicS3G0AanZa0FVe2zlQbFTXKlMJStanUvRe+8jI51BccBU67/vrry+ubespKka5Z5AaTIC8wZgCosNk222xTNnXI/GYtekSLAhfRrl0U87daw+6C0xTHt/95gw02YJwASNGrc0G5EYv0tttu0xpFOVe1vEDaTAdgFYWPBka9OwKJAUwz9al8CdSsQvlXX3010kEJbqVQRX6CTMHPuEUuzy2rYfJGjVC+2SzSkVU5WuodCJotuhzYVssqm5mU4nbFldxOX9e/hmcuiLYJ1/XfRSgrTJtDskEyXte/7EXWci7LNdRefJXSV9pVjOeKsfYH5L5LmV4MF5lqpfRcvN3vmKX1UUGoFPhk0qRJoD504OGHH66Ioj1Ddt72dKmX6lIeGDYhmhZdmvXCM4dWmtw+py4qGmY1A+v84hNus/BdmEfukDlz5ri0pMWQ2jiU54rg7tDJoj1XDPYsM+WlZFm927bJ4hCRL4tTUpYYlBcF1ROUliqgXa/CTakqiwArq4rafQ66qI+WXGHqbPcVsCqzwyYTsk1/XjMhWlfZ5lSe3qpBZRRbsZWVTuwHQteNHz8eExF7D0MO9gNtnnfeeV653y6G7KIOSvFL6S5XLn3ggQcwCx13aTfPyQ1eisciS6cV+VV21Oj6lwbNQtoJ/FI6J0S0mV0W0bdbyhStlQ6CtqxOu9JyYYPyyy5S7NdOZesdyYp9A6UjDFSit11U0ZZJ7jl9WWepFMDLfXyKl6w8wjZGKlKJZzfLTtLecPF8LbBQAxcUzuJlhTJoD+CE/U466aRTTjll1113VdkIWVBd/70osm6VGEwk7nVYbpxbbnjBRxerKEuiTy4Q4a+i5GkaWfknnPaiPhf+SHnR7oXmEsMustqKZi9pLwv/W49d13/1tj6T94dJoGELohg1j4cVF0VfaNnhsSdrFQunBEPb2H1RmCU3t8DXUs6g7ILQ5lJ45yB9pNxWsou1v2UxRyl4kQGS3AkwrVYPrNShsr+uFT1QjCKH06dPHzFihNw5tFROqdCs6pGlvPcn0BMz5KWIWVYfLgozk9SNADNnyItfNWxzjj3exeTO4oKlBoxzO8vKlSyRaGiQuCPZT2MYKGrlr/NI35GrtIsI6HqtSh1MOrDUS7XG6ClO2uWz7cwW/03ZhKwtJdYTf3b91+aVpZkpiQsJaseFLO6gjwdLOBbc9d+MwVSV619KkQjxcAZIS2FFL/02lcyYMeOOO+6QW1LHhAkTZs+e7YnyjiiljJU30Evw79WuNkFzs41Snd6xcnOvK44moC2QpFgiicCTwdpK1dbbXf/C4cl7kgilFltRhm1GFN1qD4lE0T3FfaGWf0r2g6NmdlJkW41iAVkIpWxREWxZobDnE1vbspxnKmAaM1n4LAV/13+NYvotDDh1UZ6Ysp9Z7uec5Z+7+Yv3XWUo5TQEN23atJVXXnn48OG0v+SSS4477rjcpCmd9V1TSqyIA7+LrNbcS7iV+ip+Iw3WVtTXq9lPk3KqLMLMjGqfFHuvlIcrpYNSZlnxevYSzrQVK01jZQfyZMV2MI/TGhw08cB2z62yiU9PPdnOY2nvGuxtQfLi0C++Fu8lmBTv5fNFLefy3Kyw1vUvoyb6UJRy7ty5zvYosX7bjel6cf6xd8/s+m8RkxvKl7qXHk9WsikgM8WEmaRVepno4z5LVkN+ptz/KEGmXJfSq2qj8ZetxduoVVn413rgMnLrur3FdWfnTWvRlZyQngGPtDMH/dqIRJULNguz9EAGAAtCSDFfFo+VUmtlXWaaMQW6OLTYLjArm12m+ZdUnnsMZWlgeyxyxU2+prWBd7FUkK1U2jfd5Ab3xQDLkdvRUqoMp+xLwdQ1tYZF31kWNav3Z634tuySNx6zmZf2SAnTuWKAXTVtVCntjp6x4uJW6ZrKd/5k7VbBxee0sIXrB8HqpOKzGqhZxg+L27NsbFQ2YU5vSmsTlqB5MT7TWLV9Yv1TvHZdlLJvi1M4Fue9qcuCQ6s7R9j0RupTeK+EFlIJlOSE4mc3vboUvzpMnZaS3jTnmESKQu055Zze9HuVfUhTt2fxK+8xbtmROQ+WGgYg9g9lxl/ZILnkFecSpIF8B0XilHS23OLmibFfN4j2TmrLMfV0H3fN9pE9mdZaq60IWnRm5gOUUhRtZUSHE8qOeW05qYJCWz9QZhJn+e0CC7PCb2bDJYmnarJ0yBBIG4Z1Gb92uxU/JTcwLIgjga4nLYtc5aQ5uujIp6Omln1yh2pUGfBMAed3tJhL/2rhjYEopLCfC1J4SPYGl1B+z0ScxcEObDlwARsdLyAE37KoSS1dIOn0Kxs+ZiXfpPjcfjlLJzpFoySp5Ua2ue9FT5niaBsUICdqmwyQQDcr8Nt17kS5zMKzCz43Qku/fFF9LsDRpo+LZ6zHSs6k7U9vBVeAdNeUJCshihQx9txmTDKjOBnNSt9SCfyWPa16+t7sTNKmEUYxWQa/WJhPgLAH2f6BbeS9Xa07UHS1Zx6DXfxtLLGViLmJeXrqvNazlHDNTMvMXcpad45YpDRR/xmdN/OU6EUpN1Q2uy3FwrrY79odpnRIFJehudTqfs1c85HpkeaK5Ie0WrtYe55KtfjDuv6bwGWmdSLSsmdrBipKWY1kvwwIdQMs6uNXeK+sym2XLz3JY/Dt4FkwQ5ZeLasQFlDJuJTNTo3Xs0CIm5kJky4zFld8ngMtvEgsqt1Uem6AkXCx2HhZdtr76bnPdhFjpr+2nqqSVGWz1rCwi8IcZYeZklSQyV/5a7r+MyRQzMtUxXl0sWokTa+yeibzbLTBQ66BSMFUrL78xKkt24Uv/9pjsO6h23ObTnsRWvdpG8pv3aStAC4KMNmspK0UiV582ZlvVbIrvY9S2Vq97GWdOiqjz1mJPcm36L1S7LlUiMrgW0nTKd7m4t0pwCFXweVOG0XLeTlsccykwVn2x82N4hSiyMUlKQEzDykXc5YFEOXiQCEuuaPtFvq/OAb93kltEm3XLF5u9wzsmUGb+d8ZFlswpk2tYk6wF771E2bGZroTiqFiBtBaB0tu+0hLglXXP028rI1QNmkKmrIiJPcY6okRSljPrJWeFaHQRN0lNSKxiSuUZaalLUavmnXc1TPjNZO5mbYVnbCA0wO72Jc7a0mWzUydV1gs/26AJaY9884Wdgd5Hf8twABCcgYNslBbBwAAAABJRU5ErkJggg%3D%3D" alt="designed by SingleStroke">
		</a>
	</div>
	<style type="text/css">
		#singlestroke-customizer-banner-box {
			display: none;
		}
		#singlestroke-customizer-banner-link {
			position: absolute;
			bottom: 0;
			left: 0;
			width: 299px;
			height: 45px;
		}
		.wp-full-overlay.section-open #singlestroke-customizer-banner-link {
			display: none;
		}
		@media ( max-width: 639px ) {
			#singlestroke-customizer-banner-box {
				display: none !important;
			}
		}
		@media ( min-width: 640px ) {
			#customize-controls .wp-full-overlay-sidebar-content {
				bottom: 90px;
			}
			.wp-full-overlay.section-open #customize-controls .wp-full-overlay-sidebar-content {
				bottom: 45px;
			}
			#singlestroke-customizer-banner-link {
				bottom: 45px;
			}
		}
	</style>
	<script type="text/javascript">
		( function( exports, $ ) {
			"use strict";

			// Check if customizer exists
			if ( ! wp || ! wp.customize ) return;

			// On document ready
			$( function() {
				// Initialize Layers Previewer
				$( '#singlestroke-customizer-banner-box' ).insertAfter( '#customize-footer-actions' ).show();
			} );

		} )( wp, jQuery );
	</script>
	<?php
}
add_action( 'customize_controls_print_footer_scripts', 'singlestroke_customizer_banner' );

/**
 * Add a theme dashboard page.
 */
function singlestroke_add_dashboard_page() {
	if ( is_child_theme() ) {
		$child_data = wp_get_theme();
		$theme_data = wp_get_theme( $child_data->get( 'Template' ) );
	} else {
		$theme_data = wp_get_theme();
	}

	$page = add_theme_page(
		sprintf( esc_html__( '%s Dashboard', 'singlestroke' ), $theme_data->get( 'Name' ) ),
		$theme_data->get( 'Name' ) . ' <span class="ss-dashboard-menu-icon dashicons dashicons-warning" style="margin: -0.15em 0;"></span>',
		'edit_theme_options', 
		$theme_data->get( 'TextDomain' ) . '-dashboard', 'singlestroke_dashboard_page'
	);
}
add_action( 'admin_menu', 'singlestroke_add_dashboard_page' );

/**
 * Render the theme dashboard page.
 */
function singlestroke_dashboard_page() {
	if ( is_child_theme() ) {
		$child_data = wp_get_theme();
		$theme_data = wp_get_theme( $child_data->get( 'Template' ) );
	} else {
		$theme_data = wp_get_theme();
	} ?>

	<style type="text/css">
	.ss-dashboard-wrap h1 {
		margin-right: 0;
	}
	.ss-dashboard-wrap h2 {
		text-align: left;
		font-weight: normal;
	}
	.ss-dashboard-wrap hr {
		margin: 30px 0;
	}
	.ss-dashboard-header .col {
		margin-bottom: 40px;
	}
	.ss-dashboard-screenshot {
		box-shadow: 0 5px 20px rgba(0,0,0,0.1);
	}
	.ss-dashboard-child-theme-notice {
		padding: 10px 15px;
		border: 1px dashed #ccc;
		margin: 20px 0;
		background-color: #e5e5e5;
	}
	.ss-dashboard-nav-tab-wrapper a:focus {
		box-shadow: none !important;
	}
	.ss-dashboard-tab {
		display: none;
	}
	.ss-dashboard-tab.active {
		display: block;
	}
	.ss-dashboard-demo-data-list input {
		display: none;
	}
	.ss-dashboard-demo-data-list-choice {
		display: block;
	}
	.ss-dashboard-demo-data-list input:active + .ss-dashboard-demo-data-list-choice {
		border
	}
	.ss-dashboard-demo-data-list-choice img,
	.ss-dashboard-demo-data-list-choice span {
		display: block;
		width: 100%;
		text-align: center;
	}
	.ss-dashboard-demo-data-list-choice span {
		margin-top: 10px;
		font-weight: 600;
		font-size: 120%;
	}
	.ss-dashboard-faq-list {
		list-style: none;
		margin: 0;
		padding: 0;
	}
	.ss-dashboard-faq-list li {
		margin: 40px 0;
	}
	.ss-dashboard-faq-list h4 {
		margin-bottom: 0;
	}
	.ss-dashboard-changelog {
		background-color: #fff;
		padding: 1em;
		font-size: 12px;
		overflow: auto;
		max-height: 500px;
	}
	</style>
	<script type="text/javascript">
	;jQuery.noConflict();
	(function( $ ) {
		"use strict";
		$( document ).on( 'ready', function() {

			$( '.ss-dashboard-nav-tab-wrapper a' ).on( 'click', function( e ) {
				e.preventDefault();

				var $this = $( this ),
				    href = $this.attr( 'href' ),
				    $target = $( href );

				if ( $this.hasClass( 'active' ) ) return;

				$this.addClass( 'nav-tab-active' ).siblings( 'a' ).removeClass( 'nav-tab-active' );
				$target.addClass( 'active' ).siblings( '.ss-dashboard-tab' ).removeClass( 'active' );

				if ( history.replaceState ) {
					history.replaceState( null, null, href );
				}
			});

			if ( location.hash.length > 0 ) {
				$( '.ss-dashboard-nav-tab-wrapper a[href="' + location.hash + '"]' ).trigger( 'click' );
				$( window ).scrollTop(0);
			}
		});
	})( jQuery );
	</script>
	<div class="wrap about-wrap ss-dashboard-wrap">
		<div class="ss-dashboard-header wp-clearfix two-col">
			<div class="col">
				<h1><?php echo ( $theme_data->get( 'Name' ) . ' ' . $theme_data->get( 'Version' ) ); ?></h1>

				<p class="about-description">
					<?php echo apply_filters( 'singlestroke_dashboard_tagline', esc_html__( 'Hi! Thanks for purchasing our theme. We at SingleStroke are very confident that you\'ll be delighted with the features and have a nice experience with it.', 'singlestroke' ) ); ?>
				</p>

				<?php if ( is_child_theme() ) : ?>
					<p class="ss-dashboard-child-theme-notice"><strong><?php printf( esc_html__( 'Great! You are currently using a Child Theme of %s.', 'singlestroke' ), $theme_data->get( 'Name' ) ); ?></strong></p>
				<?php endif; ?>

				<p><strong><?php esc_html_e( 'Quick links:', 'singlestroke' ); ?></strong></p>
				<ul>
					<li><a href="<?php echo esc_url( $theme_data->get( 'ThemeURI' ) ); ?>"><?php esc_html_e( 'See full features list & changelog', 'singlestroke' ); ?></a></li>
					<li><a href="<?php echo esc_url( trailingslashit( $theme_data->get( 'AuthorURI' ) ) . 'documentation/' ); ?>"><?php esc_html_e( 'Read documentation', 'singlestroke' ); ?></a></li>
					<li><a href="<?php echo esc_url( add_query_arg( 'action', 'support', trailingslashit( $theme_data->get( 'ThemeURI' ) ) ) ); ?>"><?php esc_html_e( 'Head to support site', 'singlestroke' ); ?></a></li>
					<li><a href="<?php echo esc_url( trailingslashit( $theme_data->get( 'AuthorURI' ) ) . 'subscribe/' ); ?>"><?php _e( 'Subscribe for more udpates', 'singlestroke' ); ?></a></li>
					<li><a href="<?php echo esc_url( add_query_arg( 'action', 'rate', trailingslashit( $theme_data->get( 'ThemeURI' ) ) ) ); ?>"><?php _e( 'Rate this theme (&#9733;&#9733;&#9733;&#9733;&#9733;)', 'singlestroke' ); ?></a></li>
				</ul>
			</div>
			<div class="col">
				<img class="ss-dashboard-screenshot" src="<?php echo esc_url( $theme_data->get_screenshot() ); ?>" alt="<?php echo esc_attr( $theme_data->get( 'Description' ) ); ?>">
			</div>
		</div>

		<h2 class="nav-tab-wrapper wp-clearfix ss-dashboard-nav-tab-wrapper">
			<a href="#ss-dashboard-getting-started" class="nav-tab nav-tab-active"><?php esc_html_e( 'Getting Started', 'singlestroke' ); ?></a>
			<a href="#ss-dashboard-updates" class="nav-tab"><?php esc_html_e( 'Updates', 'singlestroke' ); ?></a>
			<a href="#ss-dashboard-faq" class="nav-tab"><?php esc_html_e( 'FAQ', 'singlestroke' ); ?></a>
		</h2>

		<div id="ss-dashboard-getting-started" class="ss-dashboard-tab active">
			<h2><?php esc_html_e( 'For first time installation:', 'singlestroke' ); ?></h2>
			<div class="wp-clearfix three-col">
				<div class="col">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAToAAACdCAIAAACrTiPpAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RjdFRkZBNjMyMjM3MTFFNjlFQ0RGQzg1QzEzRjcxOTYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RjdFRkZBNjQyMjM3MTFFNjlFQ0RGQzg1QzEzRjcxOTYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpGN0VGRkE2MTIyMzcxMUU2OUVDREZDODVDMTNGNzE5NiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpGN0VGRkE2MjIyMzcxMUU2OUVDREZDODVDMTNGNzE5NiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PoY1T04AABIkSURBVHja7J0NWFNX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%3D" alt="">
					<h3><small><?php esc_html_e( 'Step 1:', 'singlestroke' ); ?></small><br><?php esc_html_e( 'Activate all required plugins.', 'singlestroke' ); ?></h3>
					<p><?php echo wp_kses(
						__( 'Required plugins are mandatory, and without them, some of the theme features might be broken. Please activate all of them via <strong>Appearance > Required Plugins</strong> page.', 'singlestroke' ),
						array( 'strong' => array() )
					); ?></p>
				</div>
				<div class="col">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAToAAACdCAIAAACrTiPpAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MUZBNjE2NUMyM0M0MTFFNkIyQzNGREE0NUVFNTgzOEMiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MUZBNjE2NUQyM0M0MTFFNkIyQzNGREE0NUVFNTgzOEMiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxRkE2MTY1QTIzQzQxMUU2QjJDM0ZEQTQ1RUU1ODM4QyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoxRkE2MTY1QjIzQzQxMUU2QjJDM0ZEQTQ1RUU1ODM4QyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PqslIC0AAA1GSURBVHja7J17cFTV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%3D%3D" alt="">
					<h3><small><?php esc_html_e( 'Step 2:', 'singlestroke' ); ?></small><br><?php esc_html_e( 'Import demo data (recommended)', 'singlestroke' ); ?></h3>
					<p><?php echo wp_kses(
						__( 'Instead of building the site from scratch, you can use our packaged demo data as a starting point. Please go to <strong>Appearance > Import Demo Data</strong> menu and follow the instructions.', 'singlestroke' ),
						array( 'strong' => array() )
					); ?></p>
				</div>
				<div class="col">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAToAAACdCAIAAACrTiPpAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NjJENzRDRDQyNDIzMTFFNkIzOEZBQTMyMjAzQTU3NkIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NjJENzRDRDUyNDIzMTFFNkIzOEZBQTMyMjAzQTU3NkIiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo2MkQ3NENEMjI0MjMxMUU2QjM4RkFBMzIyMDNBNTc2QiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo2MkQ3NENEMzI0MjMxMUU2QjM4RkFBMzIyMDNBNTc2QiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PsGTeqAAAAkJSURBVHja7N19UBTn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%3D" alt="">
					<h3><small><?php esc_html_e( 'Step 3:', 'singlestroke' ); ?></small><br><?php esc_html_e( 'Start customizing :)', 'singlestroke' ); ?></h3>
					<p><?php printf(
						wp_kses(
							__( 'The theme is now ready to use. You can start customizing from <strong>Appearance > Customize</strong> menu. Please read the <a href="%s">documentation</a> for further details about the other features.', 'singlestroke' ),
							array( 'a' => array( 'href' => array() ) )
						),
						esc_url( trailingslashit( $theme_data->get( 'AuthorURI' ) ) . 'documentation/' )
					); ?></p>
				</div>
			</div>
		</div>

		<div id="ss-dashboard-updates" class="ss-dashboard-tab">
			<h2><?php esc_html_e( 'Updates changelog:', 'singlestroke' ); ?></h2>

			<?php
			$file = get_template_directory() . '/changelog.txt';
			if ( is_file( $file ) ) {
				$changelog = file_get_contents( $file );
			} else {
				$changelog = false;
			}

			if ( ! empty( $changelog ) ) : ?>
				<pre class="ss-dashboard-changelog"><?php esc_html_e( $changelog ); ?></pre>
			<?php else : ?>
				<p><?php esc_html_e( 'See full features list & changelog', 'singlestroke' ); ?> <a href="<?php echo esc_url( $theme_data->get( 'ThemeURI' ) ); ?>"><?php esc_html_e( 'here', 'singlestroke' ); ?></a></p>
			<?php endif; ?>
		</div>

		<div id="ss-dashboard-faq" class="ss-dashboard-tab">
			<h2><?php esc_html_e( 'Frequently Asked Questions:', 'singlestroke' ); ?></h2>
			<ul class="ss-dashboard-faq-list">
				<li>
					<h4><?php esc_html_e( 'How to update my theme?', 'singlestroke' ); ?></h4>
					<p><?php printf(
						wp_kses(
							__( 'There are 2 theme update methods, <strong>manual update</strong> and <strong>automatic update</strong>. Manual update requires redownload the new theme package from the marketplace and reupload it to your site. Whereas using the automatic update, you would notice you whenever a new version released and you can directly update the theme with one click. Read more about it on <a href="%s">this documentation page</a>.', 'singlestroke' ),
							array( 'a' => array( 'href' => array() ), 'strong' => array() )
						),
						esc_url( trailingslashit( $theme_data->get( 'AuthorURI' ) ) . 'documentation/theme-updates/' )
					); ?></p>
				</li>
				<li>
					<h4><?php esc_html_e( 'What is a Child Theme? Should I use one?', 'singlestroke' ); ?></h4>
					<p><?php printf(
						wp_kses(
							__( 'We have a very detailed explanation about pros and cons on using Child Theme. Please read about Child Theme and how you should use it on <a href="%s">this documentation page</a>.', 'singlestroke' ),
							array( 'a' => array( 'href' => array() ) )
						),
						esc_url( trailingslashit( $theme_data->get( 'AuthorURI' ) ) . 'documentation/child-theme-vs-parent-theme/' )
					); ?></p>
				</li>
				<li>
					<h4><?php esc_html_e( 'How to optimize my website for better SEO?', 'singlestroke' ); ?></h4>
					<p><?php printf(
						wp_kses(
							__( 'All of SingleStroke\'s themes are built using the best SEO practices, however your SEO success also depends on other factors as well. We suggest you to install <strong>Yoast SEO</strong> plugin for managing WordPress basic SEO, keywords optimization, and other important stuffs. You shoud also read <a href="">this article</a> by Yoast SEO to learn more about WordPress SEO optimization.', 'singlestroke' ),
							array( 'a' => array( 'href' => array() ), 'strong' => array() )
						),
						esc_url( trailingslashit( $theme_data->get( 'AuthorURI' ) ) . 'wordpress-seo-optimizations/' )
					); ?></p>
				</li>
				<li>
					<h4><?php esc_html_e( 'How to make my website loads faster?', 'singlestroke' ); ?></h4>
					<p><?php printf(
						wp_kses(
							__( 'We heard "this theme is not fast". Well, a website performance really depends on many factors, and you can\'t just put all blames to a WordPress theme you are currently using. You might have chosen a wrong hosting, uploaded non-optimized images, etc. By default, a default WordPress configuration is not yet optimized for best performance, that\'s why you need to do some optimizations. We have written a short article and summarized few tips that works on our websites, you can read and learn <a href="%s">how to make your WordPress websites faster</a>.', 'singlestroke' ),
							array( 'a' => array( 'href' => array() ) )
						),
						esc_url( trailingslashit( $theme_data->get( 'AuthorURI' ) ) . 'make-wordpress-loads-faster/' )
					); ?></p>
				</li>
				<li>
					<h4><?php esc_html_e( 'I have other questions', 'singlestroke' ); ?></h4>
					<p><?php printf(
						wp_kses(
							__( 'Please head to the <a href="%s">support site</a>, our team would get back to you shortly and help you with any question or issue.', 'singlestroke' ),
							array( 'a' => array( 'href' => array() ) )
						),
						esc_url( add_query_arg( 'action', 'support', trailingslashit( $theme_data->get( 'ThemeURI' ) ) ) )
					); ?></p>
				</li>
			</ul>
		</div>
	</div>
	<?php
}

/**
 * Redirect to dashboard page when theme is activated.
 */
if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
	if ( is_child_theme() ) {
		$child_data = wp_get_theme();
		$theme_data = wp_get_theme( $child_data->get( 'Template' ) );
	} else {
		$theme_data = wp_get_theme();
	}

	wp_redirect( admin_url( 'themes.php?page=' . $theme_data->get( 'TextDomain' ) . '-dashboard' ) );
}